@extends('layouts.home')

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="checkout-options">
				<h3>User Login</h3>
				<p>Login exisiting ID</p>
				<ul class="nav">
					<li>
            <a href="{{route('register')}}">Register</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Login And Checkout to easily get access to your order history.</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-6">
						<div class="shopper-info">
							<p>User Information</p>
							<form method="POST" action="{{ route('login') }}">
                                @csrf
                                
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
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="review-payment text-right mb-3">
                                    <input type="submit" value="Login" class="btn btn-primary">
                                </div>
                            </form>
                            
						</div>
                    </div>
                </div>	
		</div>
	</section> <!--/#cart_items-->

@endsection