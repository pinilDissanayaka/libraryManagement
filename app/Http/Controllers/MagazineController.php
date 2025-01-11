<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;

class MagazineController extends Controller
{
    //

    public function getAllMagazinesAdmin(){
        $magazines=Magazine::all();
        return view('admin.magazines', ['magazines' => $magazines]);
    }

    public function addMagazineAdmin(){
        return view('admin.addMagazine');
    }

    public function storeMagazineAdmin(Request $request){
        $data=$request->validate([
            'title'=>'required',
            'publisher'=>'required',
            'publicationDate'=>'required',
            'shelfLocation'=>'required'
        ]);

        $newMagazine = Magazine::create($data);

        return redirect(route('admin_addMagazine'))->with('success', 'Magazine added successfully');
    }


    public function editMagazineAdmin(Magazine $magazine){
        return view('admin.editMagazine', ['magazine' => $magazine]);
    }

    public function updateMagazineAdmin(Magazine $magazine, Request $request){
        $data=$request->validate([
            'title'=>'required',
            'publisher'=>'required',
            'publicationDate'=>'required',
            'shelfLocation'=>'required'
        ]);

        $magazine-> update($data);

        return redirect(route('admin_magazines'))->with('success', 'Magazine edited successfully');
    }

    public function deleteMagazineAdmin($id){
        $magazine = Magazine::findOrFail($id);
        $magazine->delete();

        return redirect(route('admin_magazines'))->with('success', 'Magazine deleted successfully');
    }

    public function getAllMagazinesUser(){
        $magazines=Magazine::all();
        return view('user.viewMagazines', ['magazines' => $magazines]);
    }
}
