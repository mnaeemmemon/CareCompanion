<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pharmacy;
use App\Models\Pharmacist;
use Illuminate\Support\Facades\Auth;

class PharmacyaccsetController extends Controller
{
    public function index()
    {
        // $handler = Auth::user();
        // $pharmacy = $handler->pharmacy;

        $handler = Auth::guard('pharmacist')->user();
        $search_helper = 'home';
        // $pharmacy_id = $pharmacy->pharmacy_id;

        return view('pharmacy.accset',['handler'=>$handler,'search_helper'=>$search_helper]);
        // return view('pharmacy.accset',['pharmacy'=>$pharmacy]);
    }

    public function Pharmacy_Settings_API(Request $request)
    {
        $handler = Pharmacist::find($request->id);
        if(!$handler)
        {
            dd('nothing');
        }

        if($request->username)
        {
            $handler->username = $request->username;
        }
        if($request->contact)
        {
            $handler->contact = $request->contact;
        }
        if($request->email)
        {
            $handler->email = $request->email;
        }

        $handler->document = 'Pharmicst';
        //pharmacy setting

        if($request->pharmacy_name)
        {
            // dd($request->pharmacy_name);
            $handler->pharmacy->name  = $request->pharmacy_name;
        }
        if($request->address)
        {
            $handler->pharmacy->address  = $request->address;
        }
        if($request->contact)
        {
            $handler->pharmacy->contact  = $request->contact;
        }
        if($request->city)
        {
            $handler->pharmacy->city = $request->city;
        }

        // if($request->city)
        // {
        //     $handler->pharmacy->city = $request->city;
        // }

        if($request->image)
        {
            //deleting previous
            if($handler->image)
            {
                unlink("images/pharmacy_images/".$handler->image);
            }
            


            //for image
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
        
            // $request->image->move(public_path('images/user_images'), $imageName);
            $request->image->move(('images/pharmacy_images'), $imageName);

            /* Store $imageName name in DATABASE from HERE */
            $handler->image = $imageName ;
            $handler->pharmacy->image = $imageName ;
        }



        $handler->pharmacy->save();
        $handler->save();

        return \Response::json(['Success'=>'REQUESTED PROCEEDED']);
        
    }


    public function Pharmacy_Settings(Request $request)
    {
        // dd(Auth::user()->id);
        // dd('hi');

        // $handler = Auth::user();
        $handler = Auth::guard('pharmacist')->user();
        // dd($handler);
        
        $handler->username  = $request->username;
        $handler->contact  = $request->contact;
        $handler->email = $request->email;
        
        $handler->document = 'Pharmicst';
        //pharmacy setting
        $handler->pharmacy->name  = $request->pharmacy_name;
        $handler->pharmacy->address  = $request->address;
        $handler->pharmacy->contact  = $request->contact;
        $handler->pharmacy->city = $request->city;
        // dd($handler->pharmacy);
        // dd($pharmacy);

        if($request->image)
        {
            //deleting previous
            if($handler->image)
            {
                unlink("images/pharmacy_images/".$handler->image);
            }
            


            //for image
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
        
            // $request->image->move(public_path('images/user_images'), $imageName);
            $request->image->move(('images/pharmacy_images'), $imageName);

            /* Store $imageName name in DATABASE from HERE */
            $handler->image = $imageName ;
            $handler->pharmacy->image = $imageName ;
        }



        $handler->pharmacy->save();
        $handler->save();


        return back()
        ->with('message_success','Variant Successfuly Updated');
    }
}
