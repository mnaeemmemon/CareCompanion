<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
// use App\Http\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PharmacySaleOrAPIController extends Controller
{
    public function all($mode)
    {

        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        // dd($ORDERS);
        $pharmacy_id = auth()->user()->pharmacy_id; 
        
        if($mode == 'all')
        {
            

            
            //NEW LOGIC START
            // $date = Carbon::now()->subDays(7);
            $ORDERS = DB::table('order')

            ->select( 'orderdetails.product_ID' ,DB::raw('count(*) as order_placed'))

            ->join('orderdetails','orderdetails.Order_ID','=','order.id')

            ->join('product','product.id','=','orderdetails.product_ID')

            ->where('order.pharmacy_id',$pharmacy_id )
            // ->where('placed_date', '>=', $date)
            ->where('order.status','delivered' )

            ->groupBy('orderdetails.product_ID')

            ->get();


            // dd(count($ORDERS));
            if(count($ORDERS) < 1)
            {
                return ['msg' => 'Empty'];
            }



            $price_array[] = 0;
            $qty_array[] = 0;



            // dd($orders_for_qty);
            $prod_name[] = 0;
            $prod_cat[] = 0;

            foreach($ORDERS as $o)
            {
                $product = Product::find($o->product_ID);
                $prod_name[] = $product->name;
                $prod_cat[] = $product->type->name;
                // dd($prod_cat);

                $product_id = $o->product_ID;

                // $date = Carbon::now()->subDays(7);
                $orders_for_qty = DB::table('order')
                ->select('orderdetails.quantity')
                ->join('orderdetails','orderdetails.Order_ID','=','order.id')
                ->join('product','product.id','=','orderdetails.product_ID')
                                                                                // ->where('placed_date', '>=', $date)
                ->where('order.pharmacy_id',$pharmacy_id )
                ->where('order.status','delivered' )
                ->where('orderdetails.product_ID',$product_id )
                ->get();
        
                $quantity = 0;
                foreach($orders_for_qty as $o)
                {
                    $quantity = $quantity + $o->quantity;
                }
                $qty_array[] = $quantity;

                $price_array[] = $product->Price * $quantity;
            }
            $count = count($ORDERS);
            $final_array = []; 


            for($i = 0 ; $i < $count ; $i++)
            {
                $final_array[] = array("prod_name"=>$prod_name[$i+1], "prod_cat"=>$prod_cat[$i+1], "order_placed"=>$ORDERS[$i]->order_placed
                    ,'quantity'=>$qty_array[$i+1], 'amount' => $price_array[$i+1]);
            }

            $count = count($final_array);
            if($count > 3)
            {
                $count = 3;   
            }
            // dd($final_array);
            $price = array();
            foreach ($final_array as $key => $row)
            {
                $order_placed[$key] = $row['order_placed'];
            }
            array_multisort($order_placed, SORT_DESC, $final_array);

            return \Response::json(['SalesOr'=>$final_array]);
        }


        if($mode == 'monthly')
        {
            
            //NEW LOGIC START
            $date = Carbon::now()->subDays(30);
            $ORDERS = DB::table('order')

            ->select( 'orderdetails.product_ID' ,DB::raw('count(*) as order_placed'))

            ->join('orderdetails','orderdetails.Order_ID','=','order.id')

            ->join('product','product.id','=','orderdetails.product_ID')

            ->where('order.pharmacy_id',$pharmacy_id )
            ->where('placed_date', '>=', $date)
            ->where('order.status','delivered' )

            ->groupBy('orderdetails.product_ID')

            ->get();

            if(count($ORDERS) < 1)
            {
                return ['msg' => 'Empty'];
            }

            $price_array[] = 0;
            $qty_array[] = 0;



            // dd($orders_for_qty);
            $prod_name[] = 0;
            $prod_cat[] = 0;

            foreach($ORDERS as $o)
            {
                $product = Product::find($o->product_ID);
                $prod_name[] = $product->name;
                $prod_cat[] = $product->type->name;
                // dd($prod_cat);

                $product_id = $o->product_ID;

                $date = Carbon::now()->subDays(30);
                $orders_for_qty = DB::table('order')
                ->select('orderdetails.quantity')
                ->join('orderdetails','orderdetails.Order_ID','=','order.id')
                ->join('product','product.id','=','orderdetails.product_ID')
                                                                                ->where('placed_date', '>=', $date)
                ->where('order.pharmacy_id',$pharmacy_id )
                ->where('order.status','delivered' )
                ->where('orderdetails.product_ID',$product_id )
                ->get();
        
                $quantity = 0;
                foreach($orders_for_qty as $o)
                {
                    $quantity = $quantity + $o->quantity;
                }
                $qty_array[] = $quantity;

                $price_array[] = $product->Price * $quantity;
            }
            $count = count($ORDERS);
            $final_array = []; 


            for($i = 0 ; $i < $count ; $i++)
            {
                $final_array[] = array("prod_name"=>$prod_name[$i+1], "prod_cat"=>$prod_cat[$i+1], "order_placed"=>$ORDERS[$i]->order_placed
                    ,'quantity'=>$qty_array[$i+1], 'amount' => $price_array[$i+1]);
            }

            $count = count($final_array);
            if($count > 3)
            {
                $count = 3;   
            }
            // dd($final_array);
            $price = array();
            foreach ($final_array as $key => $row)
            {
                $order_placed[$key] = $row['order_placed'];
            }
            array_multisort($order_placed, SORT_DESC, $final_array);

            return \Response::json(['SalesOr'=>$final_array]);
        }


        if($mode == 'daily')
        {
            // $pharmacy_id = auth()->user()->pharmacy_id; 

            
            //NEW LOGIC START
            $date = Carbon::now()->subDays(1);
            $ORDERS = DB::table('order')

            ->select( 'orderdetails.product_ID' ,DB::raw('count(*) as order_placed'))

            ->join('orderdetails','orderdetails.Order_ID','=','order.id')

            ->join('product','product.id','=','orderdetails.product_ID')

            ->where('order.pharmacy_id',$pharmacy_id )
            ->where('placed_date', '>=', $date)
            ->where('order.status','delivered' )

            ->groupBy('orderdetails.product_ID')

            ->get();

            $price_array[] = 0;
            $qty_array[] = 0;

            if(count($ORDERS) < 1)
            {
                return ['msg' => 'Empty'];
            }

            // dd($orders_for_qty);
            $prod_name[] = 0;
            $prod_cat[] = 0;

            foreach($ORDERS as $o)
            {
                $product = Product::find($o->product_ID);
                $prod_name[] = $product->name;
                $prod_cat[] = $product->type->name;
                // dd($prod_cat);

                $product_id = $o->product_ID;

                $date = Carbon::now()->subDays(1);
                $orders_for_qty = DB::table('order')
                ->select('orderdetails.quantity')
                ->join('orderdetails','orderdetails.Order_ID','=','order.id')
                ->join('product','product.id','=','orderdetails.product_ID')
                                                                                ->where('placed_date', '>=', $date)
                ->where('order.pharmacy_id',$pharmacy_id )
                ->where('order.status','delivered' )
                ->where('orderdetails.product_ID',$product_id )
                ->get();
        
                $quantity = 0;
                foreach($orders_for_qty as $o)
                {
                    $quantity = $quantity + $o->quantity;
                }
                $qty_array[] = $quantity;

                $price_array[] = $product->Price * $quantity;
            }
            $count = count($ORDERS);
            $final_array = []; 


            for($i = 0 ; $i < $count ; $i++)
            {
                $final_array[] = array("prod_name"=>$prod_name[$i+1], "prod_cat"=>$prod_cat[$i+1], "order_placed"=>$ORDERS[$i]->order_placed
                    ,'quantity'=>$qty_array[$i+1], 'amount' => $price_array[$i+1]);
            }

            $count = count($final_array);
            if($count > 3)
            {
                $count = 3;   
            }
            // dd($final_array);
            $price = array();
            foreach ($final_array as $key => $row)
            {
                $order_placed[$key] = $row['order_placed'];
            }
            array_multisort($order_placed, SORT_DESC, $final_array);
            
                return \Response::json(['SalesOr'=>$final_array]);
        }

        if($mode == 'weekly')
        {
            $pharmacy_id = auth()->user()->pharmacy_id; 

            //NEW LOGIC START
            
        //NEW LOGIC START
        $date = Carbon::now()->subDays(7);
        $ORDERS = DB::table('order')

        ->select( 'orderdetails.product_ID' ,DB::raw('count(*) as order_placed'))

        ->join('orderdetails','orderdetails.Order_ID','=','order.id')

        ->join('product','product.id','=','orderdetails.product_ID')

        ->where('order.pharmacy_id',$pharmacy_id )
        ->where('placed_date', '>=', $date)
        ->where('order.status','delivered' )

        ->groupBy('orderdetails.product_ID')

        ->get();

        if(count($ORDERS) < 1)
            {
                return ['msg' => 'Empty'];
            }

        $price_array[] = 0;
        $qty_array[] = 0;



        // dd($orders_for_qty);
        $prod_name[] = 0;
        $prod_cat[] = 0;

        foreach($ORDERS as $o)
        {
            $product = Product::find($o->product_ID);
            $prod_name[] = $product->name;
            $prod_cat[] = $product->type->name;
            // dd($prod_cat);

            $product_id = $o->product_ID;

            $date = Carbon::now()->subDays(7);
            $orders_for_qty = DB::table('order')
            ->select('orderdetails.quantity')
            ->join('orderdetails','orderdetails.Order_ID','=','order.id')
            ->join('product','product.id','=','orderdetails.product_ID')
                                                                             ->where('placed_date', '>=', $date)
            ->where('order.pharmacy_id',$pharmacy_id )
            ->where('order.status','delivered' )
            ->where('orderdetails.product_ID',$product_id )
            ->get();
    
            $quantity = 0;
            foreach($orders_for_qty as $o)
            {
                $quantity = $quantity + $o->quantity;
            }
            $qty_array[] = $quantity;

            $price_array[] = $product->Price * $quantity;
        }
        $count = count($ORDERS);
        $final_array = []; 


        for($i = 0 ; $i < $count ; $i++)
        {
            $final_array[] = array("prod_name"=>$prod_name[$i+1], "prod_cat"=>$prod_cat[$i+1], "order_placed"=>$ORDERS[$i]->order_placed
                ,'quantity'=>$qty_array[$i+1], 'amount' => $price_array[$i+1]);
        }

        $count = count($final_array);
        if($count > 3)
        {
            $count = 3;   
        }
        // dd($final_array);
        $price = array();
        foreach ($final_array as $key => $row)
        {
            $order_placed[$key] = $row['order_placed'];
        }
        array_multisort($order_placed, SORT_DESC, $final_array);


            return \Response::json(['SalesOr'=>$final_array]);
        }
    }
}
