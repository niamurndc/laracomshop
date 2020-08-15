<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;

class CartController extends Controller
{
    public function store(Request $request){
        session_start();
        if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            $id = 0;
        }
        $cart = new Cart();

        $cart->product_id = $request->product_id;
        $cart->user_id =  $id;
        $cart->order_id = 0;
        $cart->qantity = $request->qantity;
        $cart->user_key = session_id();
        $cart->status = 0;

        $cart->save();
        return redirect('/cart');

    }

    public function update(Request $request, $id){
        $cart = Cart::findOrFail($id);

        $cart->qantity = $request->qantity;

        $cart->update();
        return redirect('/cart')->with('msg', 'Cart Updated Successfuly');
    }

    public function destroy($id){
        $cart = Cart::findOrFail($id);

        $cart->delete();
        return redirect('/cart')->with('msg', 'Cart deleted Successfuly');
    }
}
