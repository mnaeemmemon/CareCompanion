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

class AdminSearchController extends Controller
{
    //
    public function index(Request $request)
    {

        if($request->helper == 'home' || $request->helper == 'products' )
        {
            // dd('home');
            $products = Product::where('deleted','=',0)->where('name','LIKE','%'.$request->search.'%')
            ->orWhere('id',$request->search)
            ->get();

            $search_helper = 'products';
            return view('admin.products',['products' => $products,'search_helper'=>$search_helper]);
        }

        if($request->helper == 'orders')
        {
            // $orders = Order::where('deleted',0)->get();

            // $orders = Order::;

            $orders = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$request->search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$request->search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$request->search.'%')
            ->orWhere('order.id',$request->search)
            ->get();
            // dd($orders);
            // $orders = json_decode($orders, true);
            // $delivered = Order::where('status', 'delivered')->get();

            // $delivered = DB::table('order')
            // ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            // ->join('users','users.id','=','order.user_id')
            // ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            // ->where('order.status', '=', 'delivered')
            // ->where('order.deleted',0)
            // ->where('users.name','LIKE','%'.$request->search.'%')
            // ->orWhere('pharmacy.name','LIKE','%'.$request->search.'%')
            // ->orWhere('delivery_boy.name','LIKE','%'.$request->search.'%')
            // ->get();
            // dd($delivered);

            $delivered = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.status', '=', 'delivered')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$request->search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$request->search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$request->search.'%')
            ->get();
            // dd($delivered);
            // $delivered = json_decode($delivered, true);
            
            // $pending = Order::where('status', 'pending')->get();
            $pending = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.status', '=', 'pending')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$request->search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$request->search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$request->search.'%')
            ->get();
            // dd($pending);
            // $pending = json_decode($pending, true);

            // $cancelled = Order::where('status', 'cancelled')->get();
            $cancelled = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.status', '=', 'cancelled')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$request->search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$request->search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$request->search.'%')
            ->get();
            // dd($cancelled[0]->p_name);
            // $cancelled = json_decode($cancelled, true);



            // dd($cancelled);
            $search_helper = 'orders';
            $from_where = 'searchComponent';
            return view('admin.orders',['orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled, 'search_helper'=>$search_helper,'from_where'=>$from_where]);
        }


        if($request->helper == 'delivery')
        {
            $orders = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$request->search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$request->search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$request->search.'%')
            ->orWhere('order.id',$request->search)
            ->get();
            // dd($orders);

            $delivered = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.delivery_status', '=', 'delivered')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$request->search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$request->search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$request->search.'%')
            ->get();
            // dd($delivered);
            
            // $pending = Order::where('delivery_status', 'pending')->get();
            $pending = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.delivery_status', '=', 'pending')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$request->search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$request->search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$request->search.'%')
            ->get();
            // dd($pending);
            // $pending = json_decode($pending, true);

            // $cancelled = Order::where('delivery_status', 'cancelled')->get();
            $cancelled = DB::table('order')->select('pharmacy.name as p_name' ,'users.name as u_name' ,'delivery_boy.name as d_name','order.*')
            ->join('pharmacy','pharmacy.id','=','order.pharmacy_id')
            ->join('users','users.id','=','order.user_id')
            ->join('delivery_boy','delivery_boy.id','=','order.delivery_boy_id')
            ->where('order.delivery_status', '=', 'cancelled')
            ->where('order.deleted',0)
            ->where('users.name','LIKE','%'.$request->search.'%')
            ->orWhere('pharmacy.name','LIKE','%'.$request->search.'%')
            ->orWhere('delivery_boy.name','LIKE','%'.$request->search.'%')
            ->get();


            $search_helper = 'delivery';
            $from_where = 'searchComponent';
            return view('admin.deliveriesSection',['orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled, 'search_helper'=>$search_helper,'from_where'=>$from_where]);

        }

        if($request->helper == 'rider')
        {
            $delivery_boys = DeliveryBoy::where('deleted',0)->where('name','LIKE','%'.$request->search.'%')
            ->orWhere('id', $request->search)
            
            ->get();
            $search_helper = 'rider';

            return view('admin.delivery',['delivery_boys' => $delivery_boys, 'search_helper'=>$search_helper]);
        }

        if($request->helper == 'pharmacy')
        {
            $pharmacy = Pharmacy::where('deleted',0)->where('name','LIKE','%'.$request->search.'%')
            ->orWhere('id', $request->search)
            ->get();

            $search_helper = 'pharmacy';
            return view('admin.pharmacy',['pharmacy'=>$pharmacy, 'search_helper'=>$search_helper]);
        }

        if($request->helper == 'users')
        {
            $users = User::where('name','LIKE','%'.$request->search.'%')
            ->orWhere('email','LIKE','%'.$request->search.'%')
            ->orWhere('username','LIKE','%'.$request->search.'%')
            ->orWhere('city','LIKE','%'.$request->search.'%')
            // ->orWhere('gender','LIKE','%'.$request->search.'%')
            ->orWhere('id', $request->search)
            ->get();
            // dd($users);
            $search_helper = 'users';
            return view('admin.user',['users'=>$users,'search_helper'=>$search_helper]);
        }

        if($request->helper == 'transactions')
        {
            // $transactions = Transaction::all();

            $transactions1 = DB::table('transactions')->select('transactions.amount as T_ammount', 'account.*', 'transactions.*')
            ->join('account','account.id','=','transactions.sender_id')
            // ->join('account','account.id','=','transactions.receiver_id')
            ->where('account.Beneficiary_Name','LIKE','%'.$request->search.'%')
            // ->orWhere('account.Bank_Name','LIKE','%'.$request->search.'%')
            // ->orWhere('account.Account_Number','LIKE','%'.$request->search.'%')
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
            // dd($rec_names);

            // dd($transactions1);



            $transactions2 = DB::table('transactions')->select('transactions.amount as T_ammount', 'account.*', 'transactions.*')
            // ->join('account','account.id','=','transactions.sender_id')
            ->join('account','account.id','=','transactions.receiver_id')
            ->where('account.Beneficiary_Name','LIKE','%'.$request->search.'%')
            // ->orWhere('account.Bank_Name','LIKE','%'.$request->search.'%')
            // ->orWhere('account.Account_Number','LIKE','%'.$request->search.'%')
            ->get();

            // dd($transactions1);

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
            // dd($rec_names);

            // dd($transactions2);

            // $transactions[] = $transactions1 + $transactions2;

            // $original = new Collection(['foo']);

            // $latest = new Collection(['bar']);
                // dd($transactions1);

            $transactions = $transactions1->merge($transactions2);
            $c_sender = count($transactions1);
            $c_receiver = count($transactions2);
            $from_where = 'searchController';
            // dd($c_sender);
            // dd($transactions);





            // $transactions2 = DB::table('transactions')->select('transactions.amount as T_ammount')
            // // ->join('account','account.id','=','transactions.sender_id')
            // ->join('account','account.id','=','transactions.receiver_id')
            // ->where('account.Beneficiary_Name','LIKE','%'.$request->search.'%')
            // ->orWhere('account.Bank_Name','LIKE','%'.$request->search.'%')
            // ->orWhere('account.Account_Number','LIKE','%'.$request->search.'%')
            // ->get();

            // dd($transactions2);

            if($request->search == '')
            {
                // dd('hi');
                $transactions = Transaction::all();

                $search_helper = 'transactions';

                $c_sender = 0;
                $c_receiver = 0;
                $from_where = 'AccountController';
                return view('admin.AdminTransactions',['transactions'=>$transactions,'search_helper'=>$search_helper,'c_sender'=>$c_sender,'c_receiver'=>$c_receiver,'from_where'=>$from_where]);
            }



            $search_helper = 'transactions';
            return view('admin.AdminTransactions',['transactions'=>$transactions,'search_helper'=>$search_helper,'c_sender'=>$c_sender,'c_receiver'=>$c_receiver,'from_where'=>$from_where]);
        }

        if($request->helper == 'seller_accounts' || $request->helper == 'account_status')
        {
            // dd('home');
            // $products = Product::where('deleted','=',0)->where('name','LIKE','%'.$request->search.'%')->get();

            // $search_helper = 'products';

            $account = Account::where('Beneficiary_Name','LIKE','%'.$request->search.'%')
            ->orWhere('id', $request->search)
            ->orWhere('Account_number', $request->search)
            ->get();

            // dd($account);
            $search_helper = 'seller_accounts';
            return view('admin.AdminSellerAccounts',['accounts'=>$account ,'search_helper'=>$search_helper]);


        }



        dd($request);
        
    }
}
