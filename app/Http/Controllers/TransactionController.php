<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Book;
use App\Models\User;
use App\Models\Notification;
use Carbon\Carbon;


class TransactionController extends Controller
{
    //
    public function getAllTransactionsAdmin()
    {
        $transactions = Transaction::with('book')->get();

        return view('admin.transactions', ['transactions' => $transactions]);
    }

    public function createIssueBook(){
        return view('admin.issueBook');
    }

    public function getBook(Request $request){
        $request = $request->validate([
            'book_id' => 'required'
        ]);

        $book_id = $request['book_id'];

        $book = Book::find($book_id);

        if(is_null($book)){
            return redirect(route('admin_issue_book'))->with('status', 'Given Book not found.');
        }
        else{
            if( $book['status'] == 'Borrowed'){
                return redirect(route('admin_issue_book'))->with('status', 'Given Book already borrowed by someone!');
            }
            elseif($book['status'] == 'Reserved'){
                return redirect(route('admin_issue_book'))->with('status', 'Given Book already reserved by someone!');
            }
            else{
                return redirect(route('admin_issue_book'))->with('book', $book);
            }
        }
    }

    public function storeIssueBookAdmin(Request $request)
    {
        $data = $request->validate([
            'book_id' => 'required',
            'member_id' => 'required',
            'transaction_date' => 'required'
        ]);

        $user=User::find($data['member_id']);

        if(is_null($user)){
            return redirect(route('admin_issue_book'))->with('status', 'Given Member not found.');
        }else{
            $carbonDate = Carbon::parse($data['transaction_date']);
            $due_date = $carbonDate->addDays(7)->toDateString();
            $data['due_date'] = $due_date;
            $newTransaction = Transaction::create($data);


            $book = Book::find($data['book_id']);
            $book -> status = 'Borrowed';
            $book->save();

            $notification['member_id']=$data['member_id'];
            $notification['type']="Borrowed";
            $notification['title']=$book['title'];
            $notification['ISBN']=$book['ISBN'];
            $notification['due_date']=$due_date;
            $newNotification = Notification::create($notification);

            $book -> status = 'Borrowed';
            $book->save();

            return redirect(route('admin_issue_book'))->with('success', 'Transaction created successfully.')->with('due_date', $due_date);
        }
    }

    public function createReturnedBook(){
        return view('admin.returnBook');
    }

    public function getTransactionAdmin(Request $request){
        $request = $request->validate([
            'book_id' => 'required'
        ]);

        $book_id = $request['book_id'];

        $book = Book::find($book_id);

        $transaction = Transaction::where('book_id', $book_id)->whereNull('return_date')->first();

        if(is_null($transaction)){
            return redirect(route('admin_return_book'))->with('status', 'Given transaction not found.');
        }else{
            $user_id = $transaction['member_id'];

            $user = User::find($user_id);

            if(is_null($user)){
                return redirect(route('admin_return_book'))->with('status', 'Given member not found.');
            }
            else{
                $currentDate = Carbon::now();
                $diffInDays = ceil($currentDate->diffInDays($transaction['due_date']));

                if($diffInDays <= -1 && is_null($transaction['return_date'])){
                    $fine= abs($diffInDays) * 100;
                    $notification['member_id']=$user_id;
                    $notification['type']="Pay";
                    $notification['fine']=$fine;
                    $newNotification = Notification::create($notification);
                }else{
                    $fine=0;
                }
            }

        }

        return redirect(route('admin_return_book'))->with('transaction', $transaction)->with('user', $user)->with('book', $book)->with('fine', $fine);

    }

    public function storeReturnedBookAdmin(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'return_date' => 'required'
        ]);

        $transactionRecord = Transaction::find($data['id']);
        $transactionRecord -> return_date = $data['return_date'];
        $transactionRecord->save();

        $book_id=$transactionRecord['book_id'];

        $book = Book::find($book_id);
        $book -> status = 'Available';
        $book->save();

        $notification['member_id']=$transactionRecord['member_id'];
        $notification['type']="Return";
        $notification['title']=$book['title'];
        $notification['ISBN']=$book['ISBN'];
        $notification['due_date']=$data['return_date'];
        $newNotification = Notification::create($notification);


        return redirect(route('admin_issue_book'))->with('success', 'Transaction updated successfully.');
    }


}
