<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PharmacysalesController extends Controller
{

    public function Update_order_status($id,$status)
    {
        // dd($status);
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        $search_helper = 'orders';

        return back()
        ->with('message_success','Variant Successfuly Updated',['search_helper'=>$search_helper]);
    }

    public function Update_order_status_API($id, $status)
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        // dd($id);
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        return \Response::json(['success'=>'UPDATED', 'order' =>$order]);
    }

    public function Update_del_order_status_API($id,$status)
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        
        $order = Order::find($id);
        $order->delivery_status = $status;
        $order->save();
        return \Response::json(['success'=>'UPDATED', 'order' =>$order]);
        
    }

    public function Update_del_order_status($id , $status)
    {
        // dd($status);
        $order = Order::find($id);
        $order->delivery_status = $status;
        $order->save();
        $search_helper = 'delivery';

        return back()
        ->with('message_success','Variant Successfuly Updated',['search_helper'=>$search_helper]);
    }




    public function index(){
        // $orders = Order::all();
        $pharmacy = Auth::guard('pharmacist')->user();
        $pharmacy_id = $pharmacy->pharmacy_id;

        $orders = Order::where('deleted',0)->where('pharmacy_id',$pharmacy_id)->get();

        $delivered = Order::where('status', 'delivered')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();
        $pending = Order::where('status', 'pending')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();
        $cancelled = Order::where('status', 'cancelled')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();

        $search_helper = 'orders';
        $from_where = 'SalesController';
        // dd($orders);
        return view('pharmacy.sales',['search_helper'=>$search_helper ,'orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled,'from_where'=>$from_where]);
    }

    public function index_API(){
        // $orders = Order::all();
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        //IN API, TAKE ID AS A PARAMETER
        // $pharmacy = Auth::guard('pharmacist')->user();
        // $pharmacy_id = $pharmacy->pharmacy_id;
        $pharmacy_id = auth()->user()->pharmacy_id;

        $orders = Order::where('deleted',0)->where('pharmacy_id',$pharmacy_id)->get();

        $delivered = Order::where('status', 'delivered')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();
        $pending = Order::where('status', 'pending')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();
        $cancelled = Order::where('status', 'cancelled')->where('pharmacy_id',$pharmacy_id)->where('deleted',0)->get();


        // $orders = Order::where('deleted',0)->get();

        // $delievered = Order::where('status', 'delivered')->where('deleted',0)->get();
        // $pending = Order::where('status', 'pending')->where('deleted',0)->get();
        // $cancelled = Order::where('status', 'cancelled')->where('deleted',0)->get();
        // dd($orders);
        return \Response::json(['orders'=>$orders,
        'delivered'=>$delivered,
        'pending'=>$pending,
        'cancelled'=>$cancelled,
            ]);
    }

    public function delete_order($id)
    {
        $order = Order::find($id);
        $order->deleted = 1;
        $order->save();
        $search_helper = 'orders';
        return back()
        ->with('message_success','Variant Successfuly Updated',['search_helper'=>$search_helper]);
    }

    public function delete_order_API($id)
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }


        $order = Order::find($id);
        $order->deleted = 1;
        $order->save();

        return \Response::json(['Success'=>'DELETED']);

    }


}
