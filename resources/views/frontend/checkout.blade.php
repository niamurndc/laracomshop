@extends('layouts.home')

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="checkout-options">
				<h3>Checkout options</h3>
				<ul class="nav">
					<li>
            <a href="/user/profile">Update Profile</a>
					</li>
					<li>
						<a href="/"><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please make sure your information and confirm your order</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row margin-bottom">
					<div class="col-md-6 ">
						<h4>Billing Details</h4>
						<b>User First Name: {{$user->firs_name}}</b> <br>
						<b>User Last Name: {{$user->last_name}}</b> <br>
						<b>User Email: {{$user->email}}</b> <br>
						<b>User Phone Number: {{$user->phone}}</b> <br>
						<b>Billing Address: {{$user->address}}</b> <br>
						<b>Billing City: {{$user->city}}</b> <br>
						<b>Billing Country: {{$user->country}}</b><br>
						<hr>
						<h4>Shipping Details</h4>
						<b>Shipping Address: {{$user->address}}</b> <br>
						<b>Shipping City: {{$user->city}}</b> <br>
						<b>Shipping Country: {{$user->country}}</b> <br>
					</div>
					<div class="col-md-6 ">
						<h4>Your Product</h4>
						<div class="table-responsive cart_info">
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<th>Product Name</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									@php
										$total = 0;
									@endphp
									@foreach($carts as $cart)
									<tr>
										<td>{{$cart->product->name}}</td>
										<td><b>{{$cart->product->price}} BDT</b></td>
										<td><b>{{$cart->qantity}}</b></td>
										<td><b>{{$cart->qantity * $cart->product->price}}</b></td>
										@php 
											$total = $total + $cart->qantity * $cart->product->price;
										@endphp
									</tr>
									@endforeach
									<tr>
										<td colspan="3"><b>Total + Shipping : 60 BDT</b></td>
										<td><b>{{$total + 60}}</b></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="text-right">
					<form action="/order/create" method="post"> @csrf
						<input type="number" name="total" class="sr-only" value="{{$total + 60}}">
						<input type="submit" value="Confirm" class="btn btn-primary btn-lg">
					</form>
				</div>
			</div>

			
		</div>
	</section> <!--/#cart_items-->

@endsection