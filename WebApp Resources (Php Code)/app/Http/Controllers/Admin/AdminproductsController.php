<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;

class AdminproductsController extends Controller
{
    public function index()
    {
        $products = Product::where('deleted','=',0)->get();

        $search_helper = 'products';
        return view('admin.products',['products' => $products,'search_helper'=>$search_helper]);
    }

    public function index_API()
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        
        $products = Product::where('deleted','=',0)->get();
        // return view('admin.products',['products' => $products]);
        return \Response::json(['products'=>$products]);
    }
}
