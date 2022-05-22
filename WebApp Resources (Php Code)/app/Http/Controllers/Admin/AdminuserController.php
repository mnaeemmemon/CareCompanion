<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminuserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd($users);
        $search_helper = 'users';
        return view('admin.user',['users'=>$users,'search_helper'=>$search_helper]);
    }

    public function index_API()
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        
        $users = User::all();
        return \Response::json(['users'=>$users]);
    }

    public function API_FOR_IMG_IN_USERS($id, Request $request)
    {
        $del = User::find($id);

         //for image
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images/product_images'), $imageName);
        $request->image->move(('images/user_images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $del->image = $imageName ;

        $del->timestamps = false;
        $del->save();
        
        return 1;
    }
}
