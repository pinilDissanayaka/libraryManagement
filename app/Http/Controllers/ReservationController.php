<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    //
    public function reservationsUser(){
        $member_id=Auth::user()->id;

        $reservations=Reservation::where('member_id', $member_id)->get();

        foreach ($reservations as $reservation){
            $book_id=$reservation->book_id;
            $reservation->title=Book::where('id', $book_id)->first()->title;
            $reservation->shelfLocation=Book::where('id', $book_id)->first()->shelfLocation;
        }

        return view('user.reservation', ['reservations' => $reservations]);
    }

    public function makeReservationsUser(){
        $member_id=Auth::user()->id;

        $reservationCount=Reservation::where('member_id', $member_id)->get()->count();

        return view('user.makeReservation');
    }

    public function getBookUser(Request $request){
        $request = $request->validate([
            'title' => 'required'
        ]);

        $title = $request['title'];

        $book = Book::where('title', $title)->first();

        if(is_null($book)){
            return redirect(route('user_make_reservations'))->with('status', 'Given Book not found.');
        }
        else{
            if( $book['status'] == 'Borrowed'){
                return redirect(route('user_make_reservations'))->with('status', 'Given Book already borrowed by someone!');
            }
            elseif($book['status'] == 'Reserved'){
                return redirect(route('user_make_reservations'))->with('status', 'Given Book already reserved by someone!');
            }
            else{
                return redirect(route('user_make_reservations'))->with('book', $book);
            }
        }

    }

    public function storeReservationBookUser(Request $request){
        $request = $request->validate([
            'book_id' => 'required'
        ]);

        $book_id=$request['book_id'];

        $book = Book::find($book_id);

        if (is_null($book)){
            return redirect(route('user_make_reservations'))->with('status', 'Given Book currently not available!');
        }
        else{
            if($book->status=='Available'){
                $member_id=Auth::user()->id;

                $reservation['book_id']=$book_id;
                $reservation['member_id']=$member_id;
                $reservation['reserved_date']=Carbon::now();
                $reservation['status']="Reserved";

                $newReservation = Reservation::create($reservation);

                $book['status']="Reserved";

                $book->save();

                return redirect(route('user_reservations'))->with('success', 'Reservation created successfully.');
            }
            else{
                return redirect(route('user_make_reservations'))->with('status', 'Given Book not found.');
            }
        }

    }

    public function deleteReservationUser($id){
        $reservation = Reservation::find($id);
        $reservation['status']="Canceled";
        $reservation['cancel_date']=Carbon::now();
        $book_id=$reservation['book_id'];
        $reservation->save();


        $book_id=$reservation['book_id'];
        $book = Book::find($book_id);
        $book['status']="Available";
        $book->save();

        return redirect(route('user_reservations'))->with('success', 'Reservation canceled successfully');
    }

    public function viewReservationUser(Reservation $reservation){
        $book_id=$reservation->book_id;
        $reservation['title']=Book::where('id', $book_id)->first()->title;

        return view('user.viewReservation', ['reservation' => $reservation]);
    }


}
