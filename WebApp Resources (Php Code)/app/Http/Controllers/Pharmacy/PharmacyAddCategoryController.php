<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PharmacyAddCategoryController extends Controller
{
    public function index()
    {
         $search_helper = 'category';
        return view('pharmacy.addcategory',['search_helper'=>$search_helper]);
    }
}
