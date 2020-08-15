@extends('layouts.home')

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="checkout-options">
				<h3>User Ragistration</h3>
				<p>Register as new user</p>
				<ul class="nav">
					<li>
            <a href="{{route('login')}}">Login</a>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history.</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-6">
						<div class="shopper-info">
							<p>User Information</p>
							<form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group col-sm-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control">
                                    @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" class="form-control">
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" id="phone" class="form-control">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="city">City</label>
                                    <select name="city" id="city" class="form-control">
                                        <option value="">Select a city</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Tangail">Tangail</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Sylhet">Sylhet</option>
                                    </select>
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="country">Country</label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="">Select a country</option>
                                        <option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>Pakistan</option>
										<option>Canada</option>
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="confirm_password" class="form-control">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="review-payment text-right mb-3">
                                    <input type="submit" value="Register" class="btn btn-primary">
                                </div>
							</form>
						</div>
                    </div>
                </div>	
		</div>
	</section> <!--/#cart_items-->

@endsection
