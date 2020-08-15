@extends('layouts.home')

@section('content')

<section id="advertisement">
		<div class="container">
			<img src="/images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				@include('partials.sidebar')
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">{{$brand->name}}</h2>
						<div class="row">
							@foreach($brand->products as $product)
							<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="/uploads/product/{{$product->pimage}}" alt="product image" height="240px"/>
										<h2>{{$product->price}} BDT</h2>
										<p>{{$product->name}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>{{$product->price}}</h2>
											<p>{{$product->name}}n</p>
											<a href="/view/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
							@endforeach
						</div>
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
  </section>
  
@endsection