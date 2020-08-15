@extends('layouts.home')

@section('content')

<section>
		<div class="container">
			<div class="row">
				@include('partials.sidebar')
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="/uploads/product/{{$product->pimage}}" />
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2>{{$product->name}}</h2>
								<p><b>Category:</b> {{$product->category->name}}</p>
								
								<p><b>Availability:</b> {{$product->amount}} In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> {{$product->brand->name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								<span>
									<span>{{$product->price}} BDT</span><br>
									<label>Quantity:</label>
									<form action="/cart/create" method="post"> @csrf
									<input type="number" class="sr-only" name="product_id" value="{{$product->id}}" />
									<input type="number" name="qantity" value="1" /><br><br>
									<input type="submit" value="Add to Cart" class="btn btn-primary" style="width: 120px; color: #fff;"> 
									</form>
								</span>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li ><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
							 {{$product->description}}
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								<b>Review: 0</b> 
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">related items</h2>
            
						<?php use App\Product; $catid = $product->category_id; $cats = Product::orderBy('name', 'asc')->where('category_id', $catid)->limit(3)->get(); ?>
							@foreach($cats as $cat)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="/uploads/product/{{$cat->pimage}}" alt="" />
													<h2>{{$cat->price}}</h2>
													<p>{{$cat->name}}</p>
													<a href="/view/{{$cat->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
							@endforeach
									
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
@endsection