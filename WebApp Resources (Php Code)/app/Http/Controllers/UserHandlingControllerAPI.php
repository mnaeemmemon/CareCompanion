<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;

class UserHandlingControllerAPI extends Controller
{
    public function enter_order_detail_api(Request $request)
    {
        if($request->Order_ID == NULL ||
        $request->product_ID == NULL ||
        $request->Quantity == NULL ||
        $request->Amount == NULL ||
        $request->created_date == NULL)
        {
            return \Response::json(['Message'=>'FILL ALL OF THE FIELDS']);
        }

        $o = new OrderDetails();
        $o->Order_ID = $request->Order_ID ;
        $o->product_ID = $request->product_ID ;
        $o->Quantity = $request->Quantity ;
        $o->Amount = $request->Amount ;
        $o->created_date = $request->created_date ;
        $o->save();

        return \Response::json(['Success'=>'Request Proceeded']);
    }

    public function enter_order_api(Request $request)
    {

        if($request->pharmacy_id == NULL ||
        $request->user_id == NULL ||
        $request->delivery_boy_id == NULL ||
        $request->total == NULL ||
        $request->placed_date == NULL ||
        $request->status == NULL ||
        $request->delivery_status == NULL)
        {
            return \Response::json(['Message'=>'FILL ALL OF THE FIELDS']);
        }

        $o = new Order();
        $o->pharmacy_id = $request->pharmacy_id ;
        $o->user_id = $request->user_id ;
        $o->delivery_boy_id = $request->delivery_boy_id ;
        $o->total = $request->total ;
        $o->placed_date = $request->placed_date ;
        $o->status = $request->status ;
        $o->delivery_status = $request->delivery_status ;
        $o->save();
        // $request->validate([
        //     'pharmacy_id' => 'required',
        //     'user_id' => 'required',
        //     'delivery_boy_id' => 'required',
        //     'total' => 'required',
        //     'placed_date' => 'required',
        //     'status' => 'required',
        //     'delivery_status' => 'required',
        // ]);
        // Order::create($request->all());

        return \Response::json(['Success'=>'REQUESTED PROCEEDED']);
    }

    public function Settings_Done_API(Request $request)
    {
        $id = $request->id;
        $u = User::find($id);

        if($request->contact)
        {
            $u->contact = $request->contact;
        }

        if($request->account_id)
        {
            $u->account_id = $request->account_id;
        }
        if($request->gender)
        {
            $u->gender  = $request->gender;
        }
        // if($request->Manufacture)
        // {
        //     $u->Manufacture  = $request->Manufacture;
        // }
        if($request->name)
        {
            $u->name  = $request->name;
        }
        if($request->username)
        {
            $u->username  = $request->username;
        }
        if($request->city)
        {
            $u->city  = $request->city;
        }
        if($request->address)
        {
            $u->address  = $request->address;
        }


        
        // $u->gender = $request->gender;
        // $u->address = $request->address;
        // $u->city = $request->city;
        // $u->name = $request->name;
        // $u->username = $request->username;

        // $u->email = $request->email;

        if($request->image)
        {
            //deleting previous
            unlink("images/user_images/".$u->image);


            //for image
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
        
            // $request->image->move(public_path('images/user_images'), $imageName);
            $request->image->move(('images/user_images'), $imageName);

            /* Store $imageName name in DATABASE from HERE */
            $u->image = $imageName ;
        }

        $u->save();

        return \Response::json(['Success'=>'REQUESTED PROCEEDED']);

    }
}
