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

class PharmacysalesorController extends Controller
{
    public function CONTROL_FOR_SELECTION_SALESOR(Request $request)
    {
        $show_in = $request->get('show_in');
        $pharmacy_id = $request->get('pharmacy_id');

        if($show_in == 2) // Weekly
        {
        // $date = Carbon::now()->subDays(7);

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

        // $count = count($ORDERS);
        // $final_array = []; 


        // for($i = 0 ; $i < $count ; $i++)
        // {
        //     $final_array[] = array("prod_name"=>$prod_name[$i+1], "prod_cat"=>$prod_cat[$i+1], "order_placed"=>$ORDERS[$i]->order_placed
        //         ,'quantity'=>$qty_array[$i+1], 'amount' => $price_array[$i+1]);
        // }

        // $count = count($final_array);
        // // if($count > 3)
        // // {
        // //     $count = 3;   
        // // }
        // // dd($final_array);
        // $price = array();
        // foreach ($final_array as $key => $row)
        // {
        //     $order_placed[$key] = $row['order_placed'];
        // }
        // array_multisort($order_placed, SORT_DESC, $final_array);

        

            $html='';

            $i = 0;

                for($i = 0; $i < $count ; $i++)
                {
                    $html.='<tr>
                    <td>'.$final_array[$i]['prod_name'].'</td>

                     <td>'.$final_array[$i]['prod_cat'].'</td>

                     <td> '.$final_array[$i]['order_placed'] .' </td>
                     <td> '.$final_array[$i]['quantity'].' </td>
                     <td> Rs. '.$final_array[$i]['amount'].' </td>

                    </tr>';
                                    // <tr>
                }
                // $html.= '<h1> hello </h1>';
                $html .= '<h1> here </h1>';


            echo $html;

        }


        if($show_in == 1) // daily
        {


           
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

        if($count > 0)
        {
            foreach ($final_array as $key => $row)
            {
                $order_placed[$key] = $row['order_placed'];
            }
            array_multisort($order_placed, SORT_DESC, $final_array);
        }

        // foreach ($final_array as $key => $row)
        // {
        //     $order_placed[$key] = $row['order_placed'];
        // }
        // array_multisort($order_placed, SORT_DESC, $final_array);

        // $count = count($ORDERS);
        // $final_array = []; 


        // for($i = 0 ; $i < $count ; $i++)
        // {
        //     $final_array[] = array("prod_name"=>$prod_name[$i+1], "prod_cat"=>$prod_cat[$i+1], "order_placed"=>$ORDERS[$i]->order_placed
        //         ,'quantity'=>$qty_array[$i+1], 'amount' => $price_array[$i+1]);
        // }

        // $count = count($final_array);
        // // if($count > 3)
        // // {
        // //     $count = 3;   
        // // }
        // // dd($final_array);
        // $price = array();
        // foreach ($final_array as $key => $row)
        // {
        //     $order_placed[$key] = $row['order_placed'];
        // }
        // array_multisort($order_placed, SORT_DESC, $final_array);

        

            $html='';

            $i = 0;

                for($i = 0; $i < $count ; $i++)
                {
                    $html.='<tr>
                    <td>'.$final_array[$i]['prod_name'].'</td>

                     <td>'.$final_array[$i]['prod_cat'].'</td>

                     <td> '.$final_array[$i]['order_placed'] .' </td>
                     <td> '.$final_array[$i]['quantity'].' </td>
                     <td> Rs. '.$final_array[$i]['amount'].' </td>

                    </tr>';
                                    // <tr>
                }
                // $html.= '<h1> hello </h1>';
                $html .= '<h3> No Stats </h3>';


            echo $html;
    
            }
        


        if($show_in == 3) //monthly
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

        // $count = count($ORDERS);
        // $final_array = []; 


        // for($i = 0 ; $i < $count ; $i++)
        // {
        //     $final_array[] = array("prod_name"=>$prod_name[$i+1], "prod_cat"=>$prod_cat[$i+1], "order_placed"=>$ORDERS[$i]->order_placed
        //         ,'quantity'=>$qty_array[$i+1], 'amount' => $price_array[$i+1]);
        // }

        // $count = count($final_array);
        // // if($count > 3)
        // // {
        // //     $count = 3;   
        // // }
        // // dd($final_array);
        // $price = array();
        // foreach ($final_array as $key => $row)
        // {
        //     $order_placed[$key] = $row['order_placed'];
        // }
        // array_multisort($order_placed, SORT_DESC, $final_array);

        

            $html='';

            $i = 0;

                for($i = 0; $i < $count ; $i++)
                {
                    $html.='<tr>
                    <td>'.$final_array[$i]['prod_name'].'</td>

                     <td>'.$final_array[$i]['prod_cat'].'</td>

                     <td> '.$final_array[$i]['order_placed'] .' </td>
                     <td> '.$final_array[$i]['quantity'].' </td>
                     <td> Rs. '.$final_array[$i]['amount'].' </td>

                    </tr>';
                                    // <tr>
                }
                // $html.= '<h1> hello </h1>';
                $html .= '<h1> here </h1>';


            echo $html;
    
            }
        // {
            


        if($show_in == 0 )
        {


            // $date = Carbon::now()->subDays(7);
    
            //NEW LOGIC START
            
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
                                                                            //  ->where('placed_date', '>=', $date)
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

        // $count = count($ORDERS);
        // $final_array = []; 


        // for($i = 0 ; $i < $count ; $i++)
        // {
        //     $final_array[] = array("prod_name"=>$prod_name[$i+1], "prod_cat"=>$prod_cat[$i+1], "order_placed"=>$ORDERS[$i]->order_placed
        //         ,'quantity'=>$qty_array[$i+1], 'amount' => $price_array[$i+1]);
        // }

        // $count = count($final_array);
        // // if($count > 3)
        // // {
        // //     $count = 3;   
        // // }
        // // dd($final_array);
        // $price = array();
        // foreach ($final_array as $key => $row)
        // {
        //     $order_placed[$key] = $row['order_placed'];
        // }
        // array_multisort($order_placed, SORT_DESC, $final_array);

        

            $html='';

            $i = 0;

                for($i = 0; $i < $count ; $i++)
                {
                    $html.='<tr>
                    <td>'.$final_array[$i]['prod_name'].'</td>

                     <td>'.$final_array[$i]['prod_cat'].'</td>

                     <td> '.$final_array[$i]['order_placed'] .' </td>
                     <td> '.$final_array[$i]['quantity'].' </td>
                     <td> Rs. '.$final_array[$i]['amount'].' </td>

                    </tr>';
                                    // <tr>
                }
                // $html.= '<h1> hello </h1>';
                $html .= '<h1> here </h1>';


            echo $html;
            }
    }

    public function index()
    {
        //NEW LOGIC START
        $pharmacy = Auth::guard('pharmacist')->user();
        $pharmacy_id = $pharmacy->pharmacy_id;

        // $ORDERS = DB::table('order')

        // ->select( 'orderdetails.product_ID' ,DB::raw('count(*) as order_placed'))

        // ->join('orderdetails','orderdetails.Order_ID','=','order.id')
        // ->join('product','product.id','=','orderdetails.product_ID')
        //                                                                 // ->where('placed_date', '>=', $date)
        // ->where('order.pharmacy_id',$pharmacy_id )
        // ->where('order.status','delivered' )
        // // ->join('users','users.id','=','order.user_id')
        // ->groupBy('orderdetails.product_ID')
        // ->get();

        // // dd($ORDERS);
        
        // $price_array[] = 0;
        // // $price_array[] = [];
        // // $price_array[] = 1;
        // // dd($price_array);
        // $price_array[] = 0;
        // $qty_array[] = 0;



        // // dd($orders_for_qty);
        // $prod_name[] = 0;
        // $prod_cat[] = 0;

        // foreach($ORDERS as $o)
        // {
        //     $product = Product::find($o->product_ID);
        //     $prod_name[] = $product->name;
        //     $prod_cat[] = $product->type->name;
        //     // dd($prod_cat);

        //     $product_id = $o->product_ID;

        //     // $date = Carbon::now()->subDays(7);
        //     $orders_for_qty = DB::table('order')
        //     ->select('orderdetails.quantity')
        //     ->join('orderdetails','orderdetails.Order_ID','=','order.id')
        //     ->join('product','product.id','=','orderdetails.product_ID')
        //                                                                     //  ->where('placed_date', '>=', $date)
        //     ->where('order.pharmacy_id',$pharmacy_id )
        //     ->where('order.status','delivered' )
        //     ->where('orderdetails.product_ID',$product_id )
        //     ->get();
    
        //     // dd($orders_for_qty);
        //     $quantity = 0;
        //     foreach($orders_for_qty as $o)
        //     {
        //         $quantity = $quantity + $o->quantity;
        //     }
        //     $qty_array[] = $quantity;

        //     $price_array[] = $product->Price * $quantity;
        // }
        // // dd($qty_array);
        // $count = count($ORDERS);
        // //only 3 to show.
        // if(count($ORDERS) > 3)
        // {
        //     $count = 3;
        // }

        
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
                                                                            //  ->where('placed_date', '>=', $date)
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


        // dd($final_array);
        // $count = 3;
        // dd($ORDERS);
        // dd($price_array);
        $search_helper = 'delivery';
        
        return view('pharmacy.salesor',['search_helper'=>$search_helper, 'pharmacy_id'=>$pharmacy_id,
        'SalesOr'=>$final_array, 'count'=>$count]);

        // return view('pharmacy.salesor',['search_helper'=>$search_helper, 'pharmacy_id'=>$pharmacy_id
        // ,'qty_array'=>$qty_array,'price_array'=>$price_array,'orders'=>$ORDERS,'count'=>$count,'prod_name'=>$prod_name,'prod_cat'=>$prod_cat
        //     ]);

    }
}
