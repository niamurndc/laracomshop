@extends('layouts.home')

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="checkout-options">
				<h3>Payment Option</h3>
				<ul class="nav">
					<li>
						<a href="/checkout"><i class="fa fa-times"></i>Back</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p><b>Your Order is incomplete</b> Please make Payment for complete your order</p>
			</div><!--/register-req-->
			<div class="shopper-informations">
				<div class="row">
					<div class="col-md-6 ">
						<form action="/order/complete" method="post">
						@csrf 
							<div class="form-group">
								<label for="payment">Payment Method</label>
								<select name="payment" id="payment" required class="form-control">
									<option value="">Select A Method</option>
									<option value="bkash">Bkash</option>
									<option value="rocket">Rocket</option>
									<option value="Nagad">Nagad</option>
									<option value="cashon">Cash On Dalivery</option>
								</select>
							</div>
							@php 
							session_start();
							$sid = session_id();
							@endphp
							<input type="text" name="sid" value="{{$sid}}" class="sr-only">
							<div class="form-gorup">
								<label for="number">Number</label>
								<input type="number" name="number" id="number" class="form-control" required>
							</div>
							<input type="submit" value="Complete" class="btn btn-primary">
						</form>
					</div>	
				</div>
			</div>

			
		</div>
	</section> <!--/#cart_items-->

@endsection