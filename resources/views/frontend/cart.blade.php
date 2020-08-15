@extends('layouts.home')

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@php  
						$total = 0;
					@endphp
					@foreach($carts as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img src="/uploads/product/{{$cart->product->pimage}}" alt="product Image" height="100px" width="100px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->product->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{$cart->product->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="/cart/update/{{$cart->id}}" method="post" class="d-flex">@csrf
										<input class="cart_quantity_input" type="number" name="qantity" value="{{$cart->qantity}}" style="width: 50px; margin-top: 17px">
										<input type="submit" value="Update" class="btn btn-primary">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$cart->qantity * $cart->product->price}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="/cart/delete/{{$cart->id}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@php $total = $total + $cart->qantity * $cart->product->price; @endphp
					@endforeach	
	
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Your Cart Summery</h3>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{$total}}</span></li>
							<li>Shipping Cost <span>{{$ship = 60}}</span></li>
							<li>Total <span>{{$total + $ship}}</span></li>
						</ul>
							<a class="btn btn-default update" href="/shop">Continue Shopping</a>
							<a class="btn btn-default check_out" href="/checkout">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection