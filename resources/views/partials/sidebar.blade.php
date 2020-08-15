<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php use App\Category; $cats = Category::orderBy('name', 'asc')->get(); ?>
							@foreach($cats as $cat)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="/category/{{$cat->slug}}">{{$cat->name}}</a></h4>
								</div>
							</div>
							@endforeach 
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								<?php use App\Brand; $brands = Brand::orderBy('name', 'asc')->get(); ?>
								@foreach($brands as $brand)
									<li><a href="/brand/{{$brand->slug}}">{{$brand->name}}</a></li>
								@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
					</div>
				</div>