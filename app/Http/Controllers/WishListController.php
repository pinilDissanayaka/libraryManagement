<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class WishListController extends Controller
{
    //
    public function addWishlistUser(Request $request){
        $data=$request->validate([
            "book_id"=> "required"
        ]);

        $data['member_id']=Auth::user()->id;
        $data['added_at']=Carbon::now();

        $exist=WishList::where('book_id',$data['book_id'])->where('member_id',$data['member_id'])->first();
        if(is_null($exist)){
            WishList::create($data);
            return redirect(route('user_get_wishlist'))->with('status', 'Successfully added to the wishlist');
        }
        else{
            return redirect(route('user_get_wishlist'))->with('status', 'Given book already added to the wishlist');
        }
    }

    public function wishlistUser(){
        $member_id=Auth::user()->id;

        $wishList=WishList::where('member_id', $member_id)->get();

        foreach ($wishList as $item){
            $book_id=$item->book_id;
            $item->title=Book::where('id', $book_id)->first()->title;
        }

        return view('user.wishlist', ['wishList' => $wishList]);
    }


    public function removeFromWishlistUser($id){
        $wishlistItem=WishList::findOrFail($id);

        $wishlistItem->delete();

        return redirect(route('user_get_wishlist'))->with('success', 'Remove item successfully');
    }
}
