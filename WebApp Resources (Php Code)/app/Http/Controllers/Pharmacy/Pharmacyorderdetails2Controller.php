<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;

class Pharmacyorderdetails2Controller extends Controller
{
    public function index($id)
    {
        // dd($id);
        $orderDetails = OrderDetails::where('Order_ID',$id)->get();
        // dd($orderDetails);
        $search_helper = 'orders';
        return view('pharmacy.orderdetails2',['orderDetails'=>$orderDetails,'search_helper'=>$search_helper]);
    }

    public function index_API($id)
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        // dd($id);
        $orderDetails = OrderDetails::where('Order_ID',$id)->get();
        // dd(OrderDetails::all());
        // dd($orderDetails);
        return \Response::json(['orderDetails'=>$orderDetails]);
        // return view('pharmacy.orderdetails2',['orderDetails'=>$orderDetails]);
    }
}
