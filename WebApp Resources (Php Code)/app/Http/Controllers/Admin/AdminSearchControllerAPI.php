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
use App\Models\Account;
use App\Models\Pharmacy;
use App\Models\PharmacyInventory;
use App\Models\Product;
use App\Models\User;
use App\Models\notification;
use App\Models\Transaction;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminSearchControllerAPI extends Controller
{
    //
    public function Search_ADMIN($helper, $search)
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        
        if($helper == 'home' || $helper == 'products' )
        {
            $products = Product::where('deleted','=',0)->where('name','LIKE','%'.$search.'%')
            ->orWhere('id',$search)->get();
            return \Response::json(['products'=>$products]);
        }


        if($helper == 'orders')
        {

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
        

            $delivered = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.status', '=', 'delivered')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->get();

            $pending = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.status', '=', 'pending')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->get();

            $cancelled = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.status', '=', 'cancelled')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->get();


            return \Response::json(['orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled]);
        }

        if($helper == 'delivery')
        {
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

            $delivered = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.delivery_status', '=', 'delivered')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->get();


            $count = count($delivered);

            for($i=0; $i < $count; $i++)
            {
                if($delivered[$i]->delivery_status !== 'delivered')
                {
                    unset($delivered[$i]);
                }
            }
            // dd($delivered);

            $pending = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.delivery_status', '=', 'pending')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->get();


            $count = count($pending);

            for($i=0; $i < $count; $i++)
            {
                if($pending[$i]->delivery_status !== 'initiated')
                {
                    unset($pending[$i]);
                }
            }
            // dd($pending);
            
            $cancelled = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.delivery_status', '=', 'cancelled')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$search.'%')
            ->get();

            $count = count($cancelled);

            for($i=0; $i < $count; $i++)
            {
                if($cancelled[$i]->delivery_status !== 'cancelled')
                {
                    unset($cancelled[$i]);
                }
            }
            // dd($cancelled);


            return \Response::json(['orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled]);

        }


        if($helper == 'rider')
        {
            $delivery_boys = DeliveryBoy::where('deleted',0)->where('name','LIKE','%'.$search.'%')
            ->orWhere('id', $search)
            
            ->get();


            return \Response::json(['delivery_boys'=>$delivery_boys]);

        }

        if($helper == 'pharmacy')
        {
            $pharmacy = Pharmacy::where('deleted',0)->where('name','LIKE','%'.$search.'%')
            ->orWhere('id', $search)
            ->get();

            return \Response::json(['pharmacy'=>$pharmacy]);

        }

        if($helper == 'users')
        {
            $users = User::where('name','LIKE','%'.$search.'%')
            ->orWhere('email','LIKE','%'.$search.'%')
            ->orWhere('username','LIKE','%'.$search.'%')
            ->orWhere('city','LIKE','%'.$search.'%')
            ->orWhere('id', $search)
            ->get();

            return \Response::json(['users'=>$users]);
        }

        if($helper == 'transactions')
        {
            $transactions1 = DB::table('transactions')->select('transactions.amount as T_ammount', 'account.*', 'transactions.*')
            ->join('account','account.id','=','transactions.sender_id')
            ->where('account.Beneficiary_Name','LIKE','%'.$search.'%')

            ->get();

            $rec_names[] = 0 ;
            foreach($transactions1 as $t)
            {
                $acc = Account::find($t->receiver_id );
                $t->xtra = $acc->Beneficiary_Name;
            }

            $transactions2 = DB::table('transactions')->select('transactions.amount as T_ammount', 'account.*', 'transactions.*')
            ->join('account','account.id','=','transactions.receiver_id')
            ->where('account.Beneficiary_Name','LIKE','%'.$search.'%')
            ->get();


            $rec_names[] = 0 ;
            foreach($transactions2 as $t)
            {
                $acc = Account::find($t->sender_id );

                $t->xtra = $acc->Beneficiary_Name;

            }

            $transactions = $transactions1->merge($transactions2);
            $c_sender = count($transactions1);
            $c_receiver = count($transactions2);
            $from_where = 'searchController';

            if($search == '')
            {
                // dd('hi');
                $transactions = Transaction::all();

                $search_helper = 'transactions';

                $c_sender = 0;
                $c_receiver = 0;
                $from_where = 'AccountController';
                return view('admin.AdminTransactions',['transactions'=>$transactions,'search_helper'=>$search_helper,'c_sender'=>$c_sender,'c_receiver'=>$c_receiver,'from_where'=>$from_where]);
            }

            // dd($transactions1);

            return \Response::json(['info'=>'Transactions1 is SearchString searched as Sender, While
            Transactions2 is SearchString as Receiver. In case of T1, xtra is receiver. In case of T2, xtra is
            sender',
                'transactions1'=>$transactions1, 'transactions2'=>$transactions2]);

            // $search_helper = 'transactions';
            // return view('admin.AdminTransactions',['transactions'=>$transactions,'search_helper'=>$search_helper,'c_sender'=>$c_sender,'c_receiver'=>$c_receiver,'from_where'=>$from_where]);
        }


        if($helper == 'seller_accounts' || $helper == 'account_status')
        {
            $account = Account::where('Beneficiary_Name','LIKE','%'.$search.'%')
            ->orWhere('id', $search)
            ->orWhere('Account_number', $search)
            ->get();

            return \Response::json(['account'=>$account]);
        }

    }
}
