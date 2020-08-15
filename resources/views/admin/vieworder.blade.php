@extends('layouts.admin')

@section('admincontent')
<h1>Order Details ID: {{$order->id}}</h1>
<div class="row">
  
  <div class="col-md-6">
    <h4>Billing Details</h4>
    <b>User First Name: {{$order->user->firs_name}}</b> <br>
    <b>User Last Name: {{$order->user->last_name}}</b> <br>
    <b>User Email: {{$order->user->email}}</b> <br>
    <b>User Phone Number: {{$order->user->phone}}</b> <br>
    <b>Billing Address: {{$order->user->address}}</b> <br>
    <b>Billing City: {{$order->user->city}}</b> <br>
    <b>Billing Country: {{$order->user->country}}</b><br>
    <hr>
    <h4>Shipping Details</h4>
    <b>Shipping Address: {{$order->user->address}}</b> <br>
    <b>Shipping City: {{$order->user->city}}</b> <br>
    <b>Shipping Country: {{$order->user->country}}</b> <br>
  </div>
  <div class="col-md-6">
    <h4>Payment Details</h4>
    <b>Payment Method: {{$order->payment}}</b> <br>
    <b>Payment Number: {{$order->number}}</b> <br>
    <b>Shipping Cost: 60</b> <br>
    <b>Total Payment: {{$order->total}}</b> <br>
    <b>Payment Time: {{$order->updated_at}}</b> <br>
    <hr>
    <h4>Product Detials</h4>
    @php 
      $order_id = $order->id;
      $carts = App\Cart::where('order_id', $order_id)->where('status', 1)->get();
    @endphp
    
    <table class="table-striped table-bordered">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($carts as $cart)
          <tr>
            <td>{{$cart->product->name}}</td>
            <td>{{$cart->product->price}}</td>
            <td>{{$cart->qantity}}</td>
            <td>{{$cart->product->price * $cart->qantity}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection