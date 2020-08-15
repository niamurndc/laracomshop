@extends('layouts.admin')

@section('admincontent')

          <h1 class="h3 mb-2 text-gray-800">All Orders</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Order Tables</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#ID</th>
                      <th>Time</th>
                      <th>Payment</th>
                      <th>User Email</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->created_at }}</td>
                      <td>{{ $order->payment }} <br> {{ $order->number }}</td>
                      <td></td>
                      <td>{{ $order->total }}</td>
                      <td>{{ $order->status }}</td>
                      <td>
                        <a href="/admin/order/{{$order->id}}" class="btn btn-primary btn-circle"><i class="far fa-eye"></i></a> 
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  

@endsection