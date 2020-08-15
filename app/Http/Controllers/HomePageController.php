<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Cart;
use App\Order;

use Auth;

class HomePageController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->limit(9)->get();
        $product1 = Product::orderBy('id', 'asc')->where('category_id', 6)->limit(4)->get();
        $product2 = Product::orderBy('id', 'asc')->where('category_id', 7)->limit(4)->get();
        $product3 = Product::orderBy('id', 'asc')->where('category_id', 10)->limit(4)->get();
        return view('frontend.index', ['products' => $products, 'product1' => $product1, 'product2' => $product2, 'product3' => $product3]);
    }

    public function shop(){
        $products = Product::orderBy('id', 'desc')->paginate(6);
        return view('frontend.shop', ['products' => $products]);
    }

    public function category(){
        return view('frontend.category');
    }

    public function cart(){
        session_start();
        $sid = session_id();
        $carts = Cart::where('user_key', $sid)->where('status', 0)->get();
        return view('frontend.cart', ['carts' => $carts]);
    }

    public function checkout(){
        session_start();
        $sid = session_id();
        $user = Auth::user();
        $carts = Cart::where('user_key', $sid)->where('status', 0)->get();
        return view('frontend.checkout', ['user' => $user, 'carts' => $carts]);
    }

    public function view($id){
        $product = Product::findOrFail($id);
        return view('frontend.view', ['product' => $product]);
    }

    public function dashboard(){
        return view('frontend.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        return view('frontend.profile', ['user' => $user]);
    }

    public function update(Request $request){
        $ause = Auth::user();

        $this->validate($request, [
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users,email,'.$ause->id,
            'phone' => 'required|string|max:12',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:50',
            'city' => 'required|string|max:50',
        ]);

        $user = User::findOrFail($ause->id);

        $user->firs_name = $request->fname;
        $user->last_name = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->password = Hash::make($request->password);

        $user->update();

        return redirect('/user/profile')->with('msg', 'Profile Updated successfuly!');
    }

    public function payment(){
        return view('frontend.payment');
    }

    public function order(){
        $uid = Auth::user()->id;
        $orders = Order::where('user_id', $uid)->get();
        return view('frontend.order', ['orders' => $orders]);
    }


}
