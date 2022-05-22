<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notification;

class NotificationController extends Controller
{
    public function change_status_API($id)
    {
        $note = notification::find($id);
        $note->seen = 1;
        $note->save();
        return \Response::json(['Success'=>'Request Proceeded']);
    }

    public function Create_Notification_API(Request $request)
    {
        if($request->sender_id == NULL ||
        $request->receiver_id == NULL ||
        $request->receiver_type == NULL ||
        $request->sender_type == NULL ||
        $request->type_of_notification == NULL ||
        $request->date == NULL ||
        $request->history == NULL)
        {

            if($request->sender_type == 2)
            {
                goto abc;
            }

            return \Response::json(['Message'=>'FILL ALL OF THE FIELDS']);
        }

        abc:

        $o = new notification();
        $o->sender_id = $request->sender_id ;
        $o->receiver_id = $request->receiver_id ;
        $o->receiver_type = $request->receiver_type ;
        $o->sender_type = $request->sender_type ;
        $o->type_of_notification = $request->type_of_notification ;
        $o->date = $request->date ;
        $o->history = $request->history ;
        $o->save();

        return \Response::json(['Success'=>'Request Proceeded']);
    }
}
