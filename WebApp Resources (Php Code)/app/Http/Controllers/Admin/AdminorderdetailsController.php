<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
class AdminorderdetailsController extends Controller
{
    public function index($id)
    {
        $orderDetails = OrderDetails::where('Order_ID',$id)->get();
        // dd($orderDetails);

        $search_helper = 'orders';

        return view('admin.orderdetails',['orderDetails'=>$orderDetails, 'search_helper'=>$search_helper]);

        // return view('admin.orderdetails');
    }

    public function index_API($id)
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        $orderDetails = OrderDetails::where('Order_ID',$id)->get();
        // dd(OrderDetails::all());
        // dd($orderDetails);
        return \Response::json(['orderDetails'=>$orderDetails]);
    }
}
