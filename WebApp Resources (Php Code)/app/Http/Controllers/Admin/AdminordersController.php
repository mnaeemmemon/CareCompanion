<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminordersController extends Controller
{
    public function index(){
        $orders = Order::where('deleted',0)->get();

        // $orders = DB::table('order')
        //     ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
        //     ->join('users','users.id','=','order.user_id')
        //     ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
        //     ->where('order.deleted',0)
        //     // ->where('users.name','LIKE','%'.$request->search.'%')
        //     ->get();

        $delivered = Order::where('status', 'delivered')->get();
        $pending = Order::where('status', 'pending')->get();
        $cancelled = Order::where('status', 'cancelled')->get();
        // dd($cancelled);
        $search_helper = 'orders';
        $from_where = 'orderComponent';
        return view('admin.orders',['orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled, 'search_helper'=>$search_helper,'from_where'=>$from_where]);

        // return view('admin.orders');
    }
    public function index_API()
    {

        // dd(auth()->user());
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }


        $orders = Order::where('deleted',0)->get();

        $delivered = Order::where('status', 'delivered')->get();
        $pending = Order::where('status', 'pending')->get();
        $cancelled = Order::where('status', 'cancelled')->get();

        return \Response::json(['orders'=>$orders,
        'delievered'=>$delivered,
        'pending'=>$pending,
        'cancelled'=>$cancelled,
            ]);
    }
}
