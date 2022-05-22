<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\notification;
use Illuminate\Support\Facades\Auth;

class PharmacynotificationsController extends Controller
{
    public function index(){
        $pharmacy_id = Auth::guard('pharmacist')->user()->pharmacy_id;
        $nots = notification::where('receiver_type',1)->where('receiver_id',$pharmacy_id)->OrderBy('id','desc')->get();
        $search_helper = "notification";
        return view('pharmacy.notifications',['nots'=>$nots,'search_helper'=>$search_helper]);
    }

    public function index_API(){

        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }


        $pharmacy_id = auth()->user()->pharmacy_id;
        $nots = notification::where('receiver_type',1)->where('receiver_id',$pharmacy_id)->OrderBy('id','desc')->get();

        return \Response::json(['notifications'=>$nots]);

        // $search_helper = "notification";
        // return view('pharmacy.notifications',['nots'=>$nots,'search_helper'=>$search_helper]);
    }

    public function mark_as_read_pharmacy($id)
    {
        $note = notification::find($id);
        $note->seen = 1;
        $note->save();
        $search_helper = "notification";
        return back()->with("message_success", "Pharmacy Deleted Successfully.",['search_helper'=>$search_helper]);
    }

    public function mark_as_read_pharmacy_API($id)
    {
        // dd($id);
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        
        $note = notification::find($id);
        $note->seen = 1;
        $note->save();
        // dd($note);

        return \Response::json(['notification'=>$note]);
        // $search_helper = "notification";
        // return back()->with("message_success", "Pharmacy Deleted Successfully.",['search_helper'=>$search_helper]);
    }
}
