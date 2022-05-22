<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class AdminAccountController extends Controller
{
    public function index()
    {
        // $pharmacy = Pharmacy::all();
        // $pharmacy = Pharmacy::where('deleted',0)->get();
        $account = Account::all();
        return view('admin.pharmacy',['pharmacy'=>$pharmacy]);
    }

    public function Admin_Transactions()
    {

        $transactions = Transaction::all();

        $search_helper = 'transactions';

        $c_sender = 0;
        $c_receiver = 0;
        $from_where = 'AccountController';
        return view('admin.AdminTransactions',['transactions'=>$transactions,'search_helper'=>$search_helper,'c_sender'=>$c_sender,'c_receiver'=>$c_receiver,'from_where'=>$from_where]);
    }

    public function Admin_Transactions_API()
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }


        $transactions = Transaction::all();
        return \Response::json(['transactions'=>$transactions]);
    }

    public function AdminSellerAccounts()
    {
        $account = Account::all();

        $search_helper = 'seller_accounts';
        return view('admin.AdminSellerAccounts',['accounts'=>$account ,'search_helper'=>$search_helper]);
    }

    public function AdminSellerAccounts_API()
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        $account = Account::all();
        return \Response::json(['account'=>$account]);
    }

    public function AdminAccountStatus()
    {
        $admin = Auth::guard('admin')->user();
        // dd($admin->account);
        // $acc_id = $pharmacy_id->pharmacy->account_id;
        $account = $admin->account;

    
        $search_helper = 'account_status';
        return view('admin.AdminAccountStatus',['account'=>$account, 'search_helper'=>$search_helper]);
    }

    public function AdminAccountStatus_API($id)
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        // $admin = Auth::guard('admin')->user();
        // dd($admin->account);
        // $acc_id = $pharmacy_id->pharmacy->account_id;
        // $account = $admin->account;
        // $account 
        $account = Account::find($id);
    
        // $search_helper = 'account_status';
        return \Response::json(['account'=>$account]);
        // return view('admin.AdminAccountStatus',['account'=>$account, 'search_helper'=>$search_helper]);
    }

}
