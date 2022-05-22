<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Cart;
use App\Models\DeliveryBoy;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Pharmacist;
use App\Models\Pharmacy;
use App\Models\PharmacyInventory;
use App\Models\Product;
use App\Models\ProductType;


class AdminloginController extends Controller
{
    public function index(){
        $search_helper = 'login';
        return view('admin.login',['search_helper'=>$search_helper]);
    }
    public function checking()
    {
        $prod =  Product::find(10);
        // dd($prod);
        dd($prod->type->Name);

    }
}
