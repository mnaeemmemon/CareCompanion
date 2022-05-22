<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;
class PharmacyDeliveryController extends Controller
{
    public function index()
    {
        $pharmacy = Auth::guard('pharmacist')->user();
        $pharmacy_id = $pharmacy->pharmacy_id;


        $orders = Order::where('deleted',0)->where('pharmacy_id',$pharmacy_id)->get();

        $delivered = Order::where('delivery_status', 'delivered')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();
        $initiated = Order::where('delivery_status', 'initiated')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();
        $cancelled = Order::where('delivery_status', 'cancelled')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();
        // dd($delivered);
        $search_helper = 'delivery';
        $from_where = 'DeliveryComponent';
        return view('pharmacy.delivery',['orders'=>$orders,'delivered'=>$delivered, 'initiated' => $initiated, 'cancelled' =>$cancelled,'search_helper'=>$search_helper,'from_where'=>$from_where]);
        
        // return view('pharmacy.delivery');
    }

    public function index_API()
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }


        $pharmacy_id = auth()->user()->pharmacy_id;


        $orders = Order::where('deleted',0)->where('pharmacy_id',$pharmacy_id)->get();

        $delivered = Order::where('delivery_status', 'delivered')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();
        $initiated = Order::where('delivery_status', 'initiated')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();
        $cancelled = Order::where('delivery_status', 'cancelled')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();


        return \Response::json(['orders'=>$orders,
                    'delivered'=>$delivered,
                    'initiated'=>$initiated,
                    'cancelled'=>$cancelled]);
        // dd($orders);
        // return view('pharmacy.delivery',['orders'=>$orders,'delivered'=>$delivered, 'initiated' => $initiated, 'cancelled' =>$cancelled]);
        
        // return view('pharmacy.delivery');
    }

    // public function Add_Rider()
    // {
        
    // }

}
