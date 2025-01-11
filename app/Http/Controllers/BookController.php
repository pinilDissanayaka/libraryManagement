<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Transaction;


class BookController extends Controller
{
    //

    public function getAllBooksAdmin(){
        $books=Book::all();
        return view('admin.books', ['books' => $books]);
    }

    public function addBookAdmin(){
        return view('admin.addBook');
    }

    public function storeBookAdmin(Request $request){
        $data=$request->validate([
            'title'=>'required',
            'author'=>'required',
            'ISBN'=>'required',
            'genre'=>'required',
            'publicationYear'=>'required',
            'description'=>'required',
            'shelfLocation'=>'required'
        ]);

        $newBook = Book::create($data);

        return redirect(route('admin_addBook'))->with('success', 'Book added successfully');
    }


    public function editBookAdmin(Book $book){
        return view('admin.editBook', ['book' => $book]);
    }

    public function updateBookAdmin(Book $book, Request $request){
        $data=$request->validate([
            'title'=>'required',
            'author'=>'required',
            'ISBN'=>'required',
            'genre'=>'required',
            'publicationYear'=>'required',
            'description'=>'required',
            'shelfLocation'=>'required'
        ]);

        $book-> update($data);

        return redirect(route('admin_books'))->with('success', 'Book edited successfully');
    }

    public function deleteBookAdmin($id){
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect(route('admin_books'))->with('success', 'Book deleted successfully');
    }

    public function viewBookAdmin(Book $book){
        $book_id= $book -> id;
        $transactions = Transaction::where('book_id', $book_id)->get();

        return view('admin.viewBook' ,['book' => $book, 'transactions' => $transactions]);
    }

    public function getAllBooksUser(){
        $books=Book::all();
        return view('user.viewBooks', ['books' => $books]);
    }


    public function viewBookUser(Book $book){

        return view('user.viewBook' ,['book' => $book]);
    }

}
