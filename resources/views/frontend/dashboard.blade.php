@extends('layouts.home')

@section('content')

<div class="container">
  <div class="row">
    @include('partials.profilenav')
    <div class="col-md-9 padding-right">
      <div class="features_items">
        <h2 class="title text-center">Dashboard</h2>
        <div>
          <h1>Welcome To your Dahsboard  {{ Auth::user()->firs_name }}!</h1>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection