<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use Auth;

class OrderController extends Controller
{
    public function view($id){
        $order = Order::findOrfail($id);
        return view('frontend.vieworder', ['order' => $order]);
    }

    public function store(Request $request){
        $uid = Auth::user()->id;
        $orders = Order::where('user_id', $uid)->where('status', 0)->get();
        if(count($orders) > 0){
            $order = Order::where('user_id', $uid)->where('status', 0)->first();
            $order->total = $request->total;
            $order->update();
            return redirect('/payment');
        }else{
            $order = new Order();

            $order->user_id = Auth::user()->id;
            $order->total = $request->total;
            $order->payment = 0;
            $order->number = 0;
            $order->save();
            
            return redirect('/payment');
        }
        
    }

    public function complete(Request $request){
        
        $uid = Auth::user()->id;
        $order = Order::where('user_id', $uid)->where('status', 0)->first();

        $order->payment = $request->payment;
        $order->number = $request->number;
        $order->status = 1;

        $sid = $request->sid;

        $carts = Cart::where('user_key', $sid)->where('status', 0)->get();

        foreach($carts as $cart){
            $cart->user_id = $uid;
            $cart->order_id = $order->id;
            $cart->status = 1;

            $cart->update();
        }

        $order->update();

        return redirect('/user/dashboard')->with('msg', 'Your order successfully send');
    }

    
}
