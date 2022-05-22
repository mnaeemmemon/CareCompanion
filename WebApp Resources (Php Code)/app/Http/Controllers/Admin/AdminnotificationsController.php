<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\notification;

class AdminnotificationsController extends Controller
{
    public function index(){


        //NOTIFICATION
        // $notifications = notification::where('receiver_type',2)->get();
        $notifications = notification::where('receiver_type',2)->OrderBy('id','desc')->get();
        // dd($notifications);

        $search_helper = 'notification';
        return view('admin.notifications', ['nots'=>$notifications,'search_helper'=>$search_helper ]);
    }

    public function index_API(){

        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        //NOTIFICATION
        // $notifications = notification::where('receiver_type',2)->get();
        $notifications = notification::where('receiver_type',2)->OrderBy('id','desc')->get();
        // dd($notifications);

        return \Response::json(['notifications'=>$notifications]);

        // $search_helper = 'notification';
        // return view('admin.notifications', ['nots'=>$notifications,'search_helper'=>$search_helper ]);
    }

    public function mark_as_read($id)
    {
        $note = notification::find($id);
        $note->seen = 1;
        $note->save();

        $search_helper = 'notification';
        return back()->with("message_success", "Pharmacy Deleted Successfully.",['search_helper'=>$search_helper]);
    }

    public function mark_as_read_API($id)
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        
        $note = notification::find($id);
        $note->seen = 1;
        $note->save();

        return \Response::json(['notification'=>$note]);

        // $search_helper = 'notification';
        // return back()->with("message_success", "Pharmacy Deleted Successfully.",['search_helper'=>$search_helper]);
    }
}
