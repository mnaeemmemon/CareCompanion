<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Pharmacy;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class PharmacyAccountController extends Controller
{
    public function PharmacyTransactions()
    {
        $pharmacy_id = Auth::guard('pharmacist')->user();
        // dd($pharmacy_id->pharmacy->account_id);
        $acc_id = $pharmacy_id->pharmacy->account_id;
        $transactions = Transaction::where('sender_id',$acc_id )->orWhere('receiver_id',$acc_id)->OrderBy('id','desc')->get();
        // dd($transactions);
        $search_helper = 'transactions';
        $from_where  = 'Controller';
        return view('Pharmacy.pharmacy_transactions',['transactions'=>$transactions, 'search_helper'=>$search_helper,'from_where'=>$from_where]);
        //NEEDS AUTH ID TO FETCH RESULTS
    }

    public function PharmacyTransactions_API()
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }
        // dd(auth()->user()->pharmacy->account_id);
        // Pharmacy

        // $pharmacy_id = Auth::guard('pharmacist')->user();
        // dd($pharmacy_id->pharmacy->account_id);
        // $acc_id = $id;
        $acc_id = auth()->user()->pharmacy->account_id;
        $transactions = Transaction::where('sender_id',$acc_id )->orWhere('receiver_id',$acc_id)->OrderBy('id','desc')->get();
        // dd($transactions);

        foreach($transactions as $t)
        {
            $sender = Account::find($t->sender_id);
            $t->sender_id = $sender->Beneficiary_Name;
            $receiver = Account::find($t->receiver_id);
            $t->receiver_id = $receiver->Beneficiary_Name;
            // dd($t);
        }

        return \Response::json([
        'transactions'=>$transactions,]);


        // return view('Pharmacy.pharmacy_transactions',['transactions'=>$transactions, 'search_helper'=>$search_helper,'from_where'=>$from_where]);
        //NEEDS AUTH ID TO FETCH RESULTS
    }


    public function PharmacyAccountStatus()
    {
        $pharmacy_id = Auth::guard('pharmacist')->user();
        // dd($pharmacy_id->pharmacy->account_id);
        $acc_id = $pharmacy_id->pharmacy->account_id;
        $account = Account::where('id',$acc_id)->get();
        // dd($account);
        $search_helper = 'transactions';
        return view('Pharmacy.pharmacyAccountStatus',['account'=>$account,'search_helper'=>$search_helper]);

        //NEEDS AUTH ID TO FETCH RESULTS
    }

    public function PharmacyAccountStatus_API()
    {
        // $pharmacy_id = Auth::guard('pharmacist')->user();
        // // dd($pharmacy_id->pharmacy->account_id);
        // $acc_id = $pharmacy_id->pharmacy->account_id;
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }


        // $acc_id = $id;
        $acc_id = auth()->user()->pharmacy->account_id;

        $account = Account::where('id',$acc_id)->get();


        return \Response::json([
            'account'=>$account,]);


        // return view('Pharmacy.pharmacyAccountStatus',['account'=>$account,'search_helper'=>$search_helper]);

        //NEEDS AUTH ID TO FETCH RESULTS
    }
}
