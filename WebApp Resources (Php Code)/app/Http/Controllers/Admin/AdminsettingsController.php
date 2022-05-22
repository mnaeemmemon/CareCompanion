<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsettingsController extends Controller
{
    public function index(){

        $search_helper = 'settings';

        return view('admin.settings',['search_helper'=>$search_helper]);
    }
}
