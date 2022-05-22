<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminchatController extends Controller
{
    public function index(){
        $search_helper = 'chat';
        return view('admin.chat' , ['search_helper'=>$search_helper]);
    }
}
