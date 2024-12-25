<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function getAllNoticesAdmin(){
        $notices = Notice::all();

        return view('admin.notices', ['notices'=> $notices]);
    }

    public function addNoticeAdmin(){
        return view('admin.addNotice');
    }

    public function storeNoticeAdmin(Request $request){
        $data=$request->validate([
            'title'=>'required',
            'author'=>'required',
            'content'=>'required',
            'publicationDate'=>'required',
            'status'=>'required'
        ]);

        $newNotice = Notice::create($data);

        return redirect(route('admin.addNotice'))->with('success', 'Notice added successfully');
    }

    public function viewBookAdmin(Notice $notice){

        return view('admin.viewBook' ,['notice' => $notice]);
    }

}
