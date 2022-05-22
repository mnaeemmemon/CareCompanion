<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsignupController extends Controller
{
    public function index(){
        $search_helper = 'signUp';
        return view('admin.signup',['search_helper'=>$search_helper]);
    }
}
