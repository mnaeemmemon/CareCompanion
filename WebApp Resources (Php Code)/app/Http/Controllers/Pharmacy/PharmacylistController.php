<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;


class PharmacylistController extends Controller
{
    public function index(){
        // $products = Product::all();
        $pharmacy = Auth::guard('pharmacist')->user();
        $pharmacy_id = $pharmacy->pharmacy_id;

        $products = Product::where('pharmacy_id',$pharmacy_id)->where('deleted','=',0)->get();
        // dd($products);
        // $product_types = ProductType::all();
        $search_helper = 'products';
        return view('pharmacy.list',['products' => $products,'search_helper'=>$search_helper]);
    }

    public function index_api(){

        // dd(auth()->user());
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }


        // dd($pharm_id);
        // $products = Product::all();
        // $pharmacy = Auth::guard('pharmacist')->user();
        // $pharmacy_id = $pharmacy->pharmacy_id;
        // $pharmacy_id = $pharm_id;
        $pharmacy_id = auth()->user()->pharmacy_id;


        $products = Product::where('pharmacy_id',$pharmacy_id)->where('deleted','=',0)->get();
        // $product_types = ProductType::all();
        // dd(JSON.parse($products));
        // return response()->json;
        // return \Response::json(['success' => true,'products'=>$products]);
        return \Response::json(['products'=>$products]);
        // return $products;
    }
    
    // public function API_index()
    // {

    // }
}
