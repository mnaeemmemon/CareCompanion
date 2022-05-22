<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminresetpasswordController extends Controller
{
    public function index(){
        $search_helper = 'resetPass';
        return view('admin.resetpassword',['search_helper'=>$search_helper]);
    }
}
