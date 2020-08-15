@extends('layouts.home')

@section('content')

<div class="container">
  <div class="row">
    @include('partials.profilenav')
    <div class="col-md-9 padding-right">
      <div class="features_items">
        <h2 class="title text-center">Dashboard</h2>
        <div>
          <h1>Update Your Profile</h1>
          <form method="POST" action="/user/profile/update">
          @csrf
            <div class="form-group col-sm-6">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname" class="form-control" value="{{$user->firs_name}}">
              @error('fname')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group col-sm-6">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname" class="form-control" value="{{$user->last_name}}">
              @error('lname')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group col-sm-12">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-sm-12">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-sm-12">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{$user->address}}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label for="city">City</label>
                <select name="city" id="city" class="form-control">
                    <option value="{{$user->city}}">{{$user->city}}</option>
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
                    <option value="{{$user->country}}">{{$user->country}}</option>
                    <option value="United States">United States</option>
										<option value="Bangladesh">Bangladesh</option>
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
            <div class="review-payment text-left mb-3">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
					</form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection