@extends('layout.front')



@section('contentfront')

<!--section id="advertisement">
    <div class="container">
        image
    </div>
</section-->

<section>
    <div class="container">
        <div class="row">
			@section('title')
				<section id="pagetitle">
				    <div class="container">
				        <h2>Page produits</h2>
				    </div>
				</section>
			@endsection 
			<div class="col-sm-12 success-msg">
				@if (Session::has('success'))
					<div class="alert alert-success">{{Session::get('success')}}</div>
				@endif
			</div>
			
            <div class="col-sm-3">
                <div class="left-sidebar">
                    left-sidebar
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items row"><!--features_items-->
                    @foreach ($products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper ">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{asset('images/shop/product9.jpg')}}" alt="" />
										<h2>${{$product->price}}</h2>
										<p>{{$product->title}}</p>
										<a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										<a href='{{url("products/details/$product->idprod")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
									</div>
							 
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>${{$product->price}}</h2>
											<p>${{$product->title}}</p>
							
											<p class="btn-holder"><a href='{{url("/add-to-cart/$product->idprod")}}' class="btn btn-warning btn-block text-center add-to-cart" role="button" prod-id="{{$product->idprod}}">Add to cart</a> </p>
										   
											<a href='{{url("/productdetails/$product->idprod")}}' class="btn btn-default"><i class="fa fa-info"></i>View Details</a>
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
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">»</a></li>
                    </ul>
                </div><!--features_items-->
            </div>
			<div class="col-sm-12">
				<a href='{{url("cart")}}'>Voir panier</a>
			</div>
        </div>
    </div>
</section>
@endsection