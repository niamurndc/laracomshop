@extends('layouts.home')

@section('content')

<div class="container">
  <div class="row">
    @include('partials.profilenav')
    <div class="col-md-9 padding-right">
      <div class="features_items">
        <h2 class="title text-center">Dashboard</h2>
        <div>
          <h1>Your Orders</h1>
          <div class="table-responsive cart_info">
				<table class="table table-condensed table-striped">
					<thead>
						<tr class="cart_menu">
							<td >#ID</td>
							<td>Total Amount</td>
							<td >Payment </td>
							<td >Time</td>
							<td >Status</td>
							<td ></td>
						</tr>
					</thead>
					<tbody>
					@foreach($orders as $order)
						<tr>
							<td><b>{{$order->id}}</b></td>
							<td>
								<h4>{{$order->total}} BDT</h4>
							</td>
							<td>
								<p>{{$order->payment}}</p>
								<p>{{$order->number}}</p>
							</td>
							<td>
								<p>{{$order->updated_at}}</p>
							</td>
							<td>
								<p>{{ ($order->status == 1) ? 'Payment Pending' : 'Payment recied'}}</p>
              </td>
              <td>
								<a href="/order/view/{{$order->id}}" class="btn btn-primary">View Details</a>
							</td>
						</tr>
					@endforeach	
	
					</tbody>
				</table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection