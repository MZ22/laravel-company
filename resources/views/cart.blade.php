@extends('layout.front')

@section('contentfront') 
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
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
		</div>
        
    @if(count($cart))
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
					<form action="{{url('ordercart')}}" method="POST">
				 
						@foreach($cart as $item)
							<tr>
								<td class="cart_product">
									<a href=""><img src="images/cart/one.png" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{$item->name}}</a></h4>
									<p>Web ID: {{$item->id}}</p>
									<input type="hidden" name="prodid" value="{{$item->id}}">
								</td>
								<td class="cart_price">
									<p>${{$item->price}}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button" dd="here">
										<a prod-id="{{$item->id}}" class="cart_quantity_up" href='{{url("update-cart?product_id=$item->id&increment=1")}}'> + </a>
										<input id="cart_quantity_input" class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
										<a prod-id="{{$item->id}}" class="cart_quantity_down" href='{{url("update-cart?product_id=$item->id&decrease=1")}}'> - </a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">${{$item->subtotal}}</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" prod-id="{{$item->id}}" href='{{url("update-cart?product_id=$item->id&delete=1")}}'><i class="fa fa-times"></i></a>
								</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="6">
								<input type="hidden" name="order_cart" value="1">
								{{ csrf_field() }}
								<ul class="user_option">
									<li>
										<input type="checkbox" name="gift" value="1">
										<label>Utiliser le coupon cadeau</label>
									</li>
									<li>
										<input type="text" name="reduction">
										<label>Code de reduction</label>
									</li>
								</ul>
								
								<button class="btn btn-warning text-center">Commander</button>
							</td>
						</tr>
					</form>
				</tbody>
            </table>
        </div>
		<div class="col-sm-12">
			<div class="total_area">
				<ul>
					<li>Cart Sub Total <span>${{Cart::subtotal()}}</span></li>
					<li>Eco Tax <span>${{Cart::tax()}}</span></li>
					<li>Total <span>${{Cart::total()}}</span></li>
				</ul>
				<a class="btn btn-default update" href="{{url('clear-cart')}}">Clear Cart</a>
			</div>
		</div>
    @else
        <p>You have no items in the shopping cart</p>
		<a class="btn btn-default update" href="{{url('/product-list')}}">Ajouter des produits</a>
    @endif

    </div>
</section> <!--/#cart_items-->

<!--section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox" name="gift">
                            <label>Utiliser le coupon cadeau</label>
                        </li>
						<li>
                            <input type="text" name="reduction">
                            <label>Utiliser le coupon reduction</label>
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>

        </div>
    </div>
</section--><!--/#do_action-->
@endsection
