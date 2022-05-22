<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmindetailsController extends Controller
{
    public function index(){
        $search_helper = 'details';
        return view('admin.details', ['search_helper'=>$search_helper]);
    }
}
