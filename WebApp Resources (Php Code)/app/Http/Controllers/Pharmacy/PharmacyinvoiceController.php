<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PharmacyinvoiceController extends Controller
{
    public function index(){
        return view('pharmacy.invoice');
    }
}
