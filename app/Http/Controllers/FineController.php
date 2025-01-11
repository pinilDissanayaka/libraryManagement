<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fine;
use App\Models\Transaction;
use App\Models\Book;
use App\Models\User;
use App\Models\Notification;
use Laravel\Sail\Console\PublishCommand;


class FineController extends Controller
{
    //
    public function showFineDetailsAdmin(){
        return view('admin.payFine');

    }

    public function storePaidFineAdmin (Request $request){
        $data=$request->validate([
            'transaction_id'=>'required',
            'member_id'=>'required',
            'amount'=> 'required',
            'paid_at'=>'required'
        ]);


        $transactionRecord = Transaction::find($data['transaction_id']);
        $transactionRecord -> return_date = $data['paid_at'];
        $transactionRecord->save();

        $book_id=$transactionRecord['book_id'];

        $book = Book::find($book_id);
        $book -> status = 'Available';
        $book->save();

        $fineNotification['member_id']=$data['member_id'];
        $fineNotification['type']="Pay";
        $fineNotification['fine']=$data['amount'];

        Fine::create(($data));
        Notification::create($fineNotification);

        return redirect(route('admin_return_book'))->with('success', 'Transaction updated successfully.');
    }

    Public function getFineHistoryAdmin (){
        $fines=Fine::all();
        return view('admin.fines', ['fines' => $fines]);
    }


}
