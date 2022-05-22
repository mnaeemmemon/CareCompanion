<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    //
    public function add_to_cart(Request $request)
    {
        $cart = new Cart();
        $cart->user_ID = $request->user_ID;
        $cart->product_ID = $request->product_ID;
        $cart->Quantity = $request->Quantity;
        $cart->Amount = $request->Amount;
        $cart->save();

        return \Response::json(['Success'=>'ADDED TO CART']);
    }
    public function delete_to_cart($id)
    {
        // dd($id);
        $cart = Cart::find($id);
        // dd($cart);
        $cart->delete();
        return \Response::json(['Success'=>'REMOVED FROM CART']);
    }
}
