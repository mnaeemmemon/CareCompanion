<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Cart;
use App\Models\DeliveryBoy;
use App\Models\Order;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\OrderDetails;
use App\Models\Pharmacist;
use App\Models\Pharmacy;
use App\Models\PharmacyInventory;
use App\Models\Product;
use App\Models\User;
use App\Models\notification;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PharmacySearchControllerAPI extends Controller
{
    public function Search_PHARM($id, $helper, $search)
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        
        if($helper == 'category'  )
        {
            $cats = ProductType::where('name','LIKE','%'.$search.'%')
            ->orWhere('id',$search)
            ->where('deleted',0)->get();

            $count = count($cats);
            //for removing which are not deleted = 0. bcz query is not working well.
            for($i=0; $i < $count; $i++)
            {
                if($cats[$i]->deleted !== 0)
                {
                    unset($cats[$i]);
                }
            }


            return \Response::json(['cats'=>$cats]);
        }


        if($helper == 'home' || $helper == 'products' )
        {
            // dd('home');
            // $pharmacy = Auth::guard('pharmacist')->user();
            // $pharmacy_id = $pharmacy->pharmacy_id;
            // dd($pharmacy_id->pharmacy->account_id);
            // $acc_id = $pharmacy_id->pharmacy->account_id;
            // dd($pharmacy_id);
            // dd($id);

           
            $products = Product::where('deleted','=',0)
            ->where('id',$search)
            ->orWhere('name','LIKE','%'.$search.'%')->get();

            $count = count($products);
            for($i=0; $i < $count; $i++)
            {
                if($products[$i]->deleted !== 0)
                {
                    unset($products[$i]);
                }
            }

            $count = count($products);
            for($i=0; $i < $count; $i++)
            {
                if($products[$i]->pharmacy_id != $id)
                {
                    // dd($products[$i]->pharmacy_id);
                    unset($products[$i]);
                }
            }

            return \Response::json(['products'=>$products]);

            // // dd($products);
            // $search_helper = 'products';
            // return view('pharmacy.list',['products' => $products,'search_helper'=>$search_helper]);
        }

        if($helper == 'orders')
        {
            // $orders = Order::where('deleted',0)->get();

            // $orders = Order::;
            // dD('hi');
            // $pharmacy = Auth::guard('pharmacist')->user();
            $pharmacy_id = $id;

            $orders = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            // ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.deleted',0)
            // ->where('order.pharmacy_id',$pharmacy_id)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            // ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->orWhere('order.id',$search)
            ->get();

            // dd($orders);
            //          $c = count($records);
            //             for($j =0 ; $j < $c; $j++)
            //             {
            //                 // dd($records[$j]->order->status);
            //                 if($records[$j]->order->status !== 'delivered' )
            //                 {
            //                     // dd('not');
            //                     unset($records[$j]);
            //                 }
            //                 // dd('yes');
            //                 // dd($records[$j]);
            //                 // unset($records[$j]);
    
            //             }
            //             // dd($records);


            $c = count($orders);
            for($j =0 ; $j < $c; $j++)
            {
                // dd($records[$j]->order->status);
                if($orders[$j]->pharmacy_id != $pharmacy_id )
                {
                    // dd('not');
                    unset($orders[$j]);
                }
                // dd('yes');
                // dd($records[$j]);
                // unset($records[$j]);
            }
            // dd($orders);



            // $delivered = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'order.*')
            // ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            // ->join('users','users.id','=','order.user_id')
            // // ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            // ->where('order.status', '=', 'delivered')
            // ->where('order.deleted',0)
            // ->where('users.name','LIKE','%'.$search.'%')
            // ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            // // ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            // ->get();


            $delivered = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            // ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.deleted',0)
            // ->where('order.pharmacy_id',$pharmacy_id)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            // ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->orWhere('order.id',$search)
            ->get();


            // dd($delivered);
            // $delivered = json_decode($delivered, true);
            
            $c = count($delivered);
            for($j =0 ; $j < $c; $j++)
            {
                // dd($records[$j]->order->status);
                if($delivered[$j]->pharmacy_id != $pharmacy_id )
                {
                    // dd('not');
                    unset($delivered[$j]);
                }
            }

            $c = count($delivered);
            for($j =0 ; $j < $c; $j++)
            {
                // dd($records[$j]->order->status);
                if($delivered[$j]->status != 'delivered' )
                {
                    // dd('not');
                    unset($delivered[$j]);
                }
            }
            // dd($delivered);

            // $pending = Order::where('status', 'pending')->get();
            // $pending = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'order.*')
            // ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            // ->join('users','users.id','=','order.user_id')
            // // ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            // ->where('order.status', '=', 'pending')
            // ->where('order.deleted',0)
            // ->where('users.name','LIKE','%'.$search.'%')
            // ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            // // ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            // ->get();
            $pending = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            // ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.deleted',0)
            // ->where('order.pharmacy_id',$pharmacy_id)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            // ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->orWhere('order.id',$search)
            ->get();


            // dd($pending);
            // $pending = json_decode($pending, true);

            $c = count($pending);
            for($j =0 ; $j < $c; $j++)
            {
                // dd($records[$j]->order->status);
                if($pending[$j]->pharmacy_id != $pharmacy_id )
                {
                    // dd('not');
                    unset($pending[$j]);
                }
                // dd('yes');
                // dd($records[$j]);
                // unset($records[$j]);
            }

            $c = count($pending);
            for($j =0 ; $j < $c; $j++)
            {
                // dd($records[$j]->order->status);
                if($pending[$j]->status != 'pending' )
                {
                    // dd('not');
                    unset($pending[$j]);
                }
            }
            // dd($pending);


            // $cancelled = Order::where('status', 'cancelled')->get();
            // $cancelled = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'order.*')
            // ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            // ->join('users','users.id','=','order.user_id')
            // // ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            // ->where('order.status', '=', 'cancelled')
            // ->where('order.deleted',0)
            // ->where('users.name','LIKE','%'.$search.'%')
            // ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            // // ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            // ->get();

            $cancelled = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            // ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.deleted',0)
            // ->where('order.pharmacy_id',$pharmacy_id)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            // ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->orWhere('order.id',$search)
            ->get();

            // dd($cancelled[0]->p_name);
            // $cancelled = json_decode($cancelled, true);

            $c = count($cancelled);
            for($j =0 ; $j < $c; $j++)
            {
                if($cancelled[$j]->pharmacy_id != $pharmacy_id )
                {
                    unset($cancelled[$j]);
                }
            }
            // dd($cancelled);
            $c = count($cancelled);
            for($j =0 ; $j < $c; $j++)
            {
                // dd($records[$j]->order->status);
                if($cancelled[$j]->status != 'cancelled' )
                {
                    // dd('not');
                    unset($cancelled[$j]);
                }
            }
            // dd($cancelled);

            return \Response::json(['orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled]);


            // $search_helper = 'orders';
            // $from_where = 'searchComponent';
            // return view('pharmacy.sales',['orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled, 'search_helper'=>$search_helper,'from_where'=>$from_where]);
        }


        if($helper == 'delivery')
        {
            // $orders = Order::where('deleted',0)->get();

            // $orders = Order::;
            // $pharmacy = Auth::guard('pharmacist')->user();
            $pharmacy_id = $id;


            $orders = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->orWhere('order.id',$search)
            ->get();
            // dd($orders);

            // dd(count($orders));
            

            // $transactions = $transactions1->merge($transactions2);

            $c = count($orders);
            for($j =0 ; $j < $c; $j++)
            {
                if($orders[$j]->pharmacy_id != $pharmacy_id )
                {
                    unset($orders[$j]);
                }
            }

            // dd($orders);
            //TO GET THE ORDER MODELS TO SHOW ORDER->ORDERDETAIL->PRODUCT
            $array[] = 0;
            // dd($array);
            foreach($orders as $o)
            {
                // dd($o->id);
                // $array = $array +  Order::find($o->id);
                array_push($array,Order::find($o->id));

                // $transactions = $transactions1->merge($transactions2);
            }
            // dd($array);
     
            $delivered = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.delivery_status', '=', 'delivered')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->orWhere('order.id',$search)
            ->get();
            // dd($delivered);
            
            $c = count($delivered);
            for($j =0 ; $j < $c; $j++)
            {
                if($delivered[$j]->pharmacy_id != $pharmacy_id )
                {
                    unset($delivered[$j]);
                }
            }
            $c = count($delivered);
            for($j =0 ; $j < $c; $j++)
            {
                // dd($records[$j]->order->status);
                if($delivered[$j]->delivery_status != 'delivered' )
                {
                    // dd('not');
                    unset($delivered[$j]);
                }
            }
            // dd($delivered);

            // $pending = Order::where('delivery_status', 'pending')->get();
            $initiated = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.delivery_status', '=', 'pending')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->orWhere('order.id',$search)
            ->get();
            // dd($pending);
            // $pending = json_decode($pending, true);
            $c = count($initiated);
            for($j =0 ; $j < $c; $j++)
            {
                if($initiated[$j]->pharmacy_id != $pharmacy_id )
                {
                    unset($initiated[$j]);
                }

                if($initiated[$j]->delivery_status != 'initiated' )
                {
                    unset($initiated[$j]);
                }
            }
            // dd($pending);

            // $cancelled = Order::where('delivery_status', 'cancelled')->get();
            $cancelled = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.delivery_status', '=', 'cancelled')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->orWhere('order.id',$search)
            ->get();

            // dd($cancelled);
            $c = count($cancelled);
            for($j =0 ; $j < $c; $j++)
            {
                if($cancelled[$j]->pharmacy_id != $pharmacy_id )
                {
                    unset($cancelled[$j]);
                }

                if($cancelled[$j]->delivery_status != 'cancelled' )
                {
                    unset($cancelled[$j]);
                }
            }
            // dd($cancelled);

            return \Response::json(['orders'=>$orders,'delivered'=>$delivered, 'initiated' => $initiated, 'cancelled' =>$cancelled]);

            // $search_helper = 'delivery';
            // $from_where = 'searchComponent';
            // return view('pharmacy.delivery',['orders'=>$orders,'delivered'=>$delivered, 'initiated' => $initiated, 'cancelled' =>$cancelled, 'search_helper'=>$search_helper,'from_where'=>$from_where,'array'=>$array]);
            
        }



        if($helper == 'transactions')
        {
            // $transactions = Transaction::all();
            // $pharmacy = Auth::guard('pharmacist')->user();
            // $acc_id = $pharmacy->pharmacy->account_id;

            $acc_id = Pharmacy::find($id)->account_id;

            // dd($acc_id);


            $transactions1 = DB::table('transactions')->select('transactions.amount as T_ammount', 'account.*', 'account.id As ACC_ID', 'transactions.*')
            ->join('account','account.id','=','transactions.sender_id')
            // ->join('account','account.id','=','transactions.receiver_id')
            ->where('account.Beneficiary_Name','LIKE','%'.$search.'%')
            

            ->orWhere('transactions.sender_id',$search)

            
            // ->orWhere('account.Account_Number','LIKE','%'.$search.'%')
            ->get();

            // dd($transactions1);

            $rec_names[] = 0 ;
            foreach($transactions1 as $t)
            {
                // dd($t);
                $acc = Account::find($t->receiver_id );
                // dd($acc);
                // $rec_names[] = $acc->Beneficiary_Name;
                $t->xtra = $acc->Beneficiary_Name;
                // $t->save();
                // dd($t);
            }


            $c = count($transactions1);
            for($j =0 ; $j < $c; $j++)
            {
                if($transactions1[$j]->sender_id !== $acc_id && $transactions1[$j]->receiver_id !== $acc_id)
                {
                    // dd($transactions1[$j]->sender_id);
                    unset($transactions1[$j]);
                }
            }



            $transactions2 = DB::table('transactions')->select('transactions.amount as T_ammount', 'account.*', 'account.id As ACC_ID', 'transactions.*')
            // ->join('account','account.id','=','transactions.sender_id')
            ->join('account','account.id','=','transactions.receiver_id')
            ->where('account.Beneficiary_Name','LIKE','%'.$search.'%')


            ->orWhere('transactions.receiver_id',$search)
            // ->orWhere('account.Bank_Name','LIKE','%'.$search.'%')
            // ->orWhere('account.Account_Number','LIKE','%'.$search.'%')
            ->get();

            // dd($transactions2);

            $rec_names[] = 0 ;
            foreach($transactions2 as $t)
            {
                // dd($t);
                $acc = Account::find($t->sender_id );
                // dd($acc);
                // $rec_names[] = $acc->Beneficiary_Name;
                $t->xtra = $acc->Beneficiary_Name;
                // $t->save();
                // dd($t);
            }

            // dd($transactions2);

            // $c = count($transactions2);
            // for($j =0 ; $j < $c; $j++)
            // {
            //     if($transactions2[$j]->ACC_ID !== $acc_id )
            //     {
            //         unset($transactions2[$j]);
            //     }
            // }

            $c = count($transactions2);
            for($j =0 ; $j < $c; $j++)
            {
                if($transactions2[$j]->sender_id !== $acc_id && $transactions2[$j]->receiver_id !== $acc_id)
                {
                    // dd($transactions2[$j]->sender_id);
                    unset($transactions2[$j]);
                }
            }

            // dd($rec_names);

            // dd($transactions2);

            // $transactions[] = $transactions1 + $transactions2;

            // $original = new Collection(['foo']);

            // $latest = new Collection(['bar']);
                // dd($transactions1);

            $transactions = $transactions1->merge($transactions2);
            $c_sender = count($transactions1);
            $c_receiver = count($transactions2);
            
    

            // dd($transactions2);

                // if($search == '')
                // {
                //     // dd('hi');
                //     $pharmacy_id = Auth::guard('pharmacist')->user();
                //     // dd($pharmacy_id->pharmacy->account_id);
                //     $acc_id = $pharmacy_id->pharmacy->account_id;
                //     $transactions = Transaction::where('sender_id',$acc_id )->orWhere('receiver_id',$acc_id)->OrderBy('id','desc')->get();
                //     // dd($transactions);
                //     $search_helper = 'transactions';
                //     $from_where  = 'Controller';
                //     return view('Pharmacy.pharmacy_transactions',['transactions'=>$transactions, 'search_helper'=>$search_helper,'from_where'=>$from_where]);
                // }


                return \Response::json(['info'=>'Transactions1 is SearchString searched as Sender, While
            Transactions2 is SearchString as Receiver. In case of T1, xtra is receiver. In case of T2, xtra is
            sender',
                'transactions1'=>$transactions1, 'transactions2'=>$transactions2]);

            // $search_helper = 'transactions';
            // $from_where = 'searchController';
            // return view('Pharmacy.pharmacy_transactions',['transactions'=>$transactions,'search_helper'=>$search_helper,'c_sender'=>$c_sender,'c_receiver'=>$c_receiver,'from_where'=>$from_where]);
        }
    }
}
