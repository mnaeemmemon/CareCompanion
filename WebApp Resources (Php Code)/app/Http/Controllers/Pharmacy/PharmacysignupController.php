<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PharmacysignupController extends Controller
{
    public function index(){
        return view('pharmacy.signup');
    }
    public function pharmacy_sign_in()
    {
        return view('pharmacy.pharmacy_login');
    }
}
