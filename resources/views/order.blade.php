@extends('layout.front')

@section('contentfront') 

<section id="do_action">
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
				@if (Session::has('error'))
					<div class="alert alert-danger">{{Session::get('error')}}</div>
				@endif
				@if (Session::has('success'))
					<div class="alert alert-success">{{Session::get('success')}}</div>
				@endif
			</div>
            <div class="col-sm-7">
                <div class="order-steps">
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Informations et addresse de livraison</a>
							</h4>
						  </div>
						  <div id="collapse1" class="panel-collapse collapse in">
						  	@if (session('customer'))
						  		<div class="panel-body">
							  		<p>Bonjour, {{ session('customer')['name'] }}</p>
							  		<p>email: {{ session('customer')['email'] }}</p>
							  		<a href="/logoutcustomer">Deconnexion</a>
						  		</div>
						  	@else
								<div class="panel-body">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
									  <li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">S'authentifier</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">S'inscrir</a>
									  </li>
									</ul>
									<div class="tab-content" id="myTabContent">
										  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
											<form action="/logincustomer" method="POST" class="loginform">
												{{ csrf_field() }}
												Email : <input type="email" name="email" class="form-control">
												Password : <input type="password" name="password" class="form-control">
												<button>Valider</button>
											</form>
										  </div>
										  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
											<form action="/savecustomer" method="POST" class="subscriptionform">
												{{ csrf_field() }}
												Nom : <input type="text" name="name" class="form-control">
												Email : <input type="email" name="email" class="form-control">
												Password : <input type="password" name="password" class="form-control">
												Tel : <input type="text" name="tel" class="form-control">
												Adresse livraison : <input type="text" name="address" class="form-control">
												<button>Valider</button>
											</form>
										  </div>
									</div>
								</div>
							@endif
						  </div>
						</div>
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Livraison</a>
							</h4>
						  </div>
						  <div id="collapse2" class="panel-collapse collapse">
							<div class="panel-body">
								<form action="savecarrier" method="POST" class="carrierform">
									<input type="hidden" name="carrier_token" value="{{ csrf_token() }}">
									@foreach ($carriers as $carrier)
										<img src="{{$carrier->image}}" /> {{$carrier->id}} :<input type="radio" class="form-control" name="carrier" value="{{$carrier->id}}">
									@endforeach

									<button>Valider</button>
								</form>
							</div>
						  </div>
						</div>
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Paiement</a>
							</h4>
						  </div>
						  <div id="collapse3" class="panel-collapse collapse">
							<div class="panel-body">
								<form action="savepayment" method="POST" class="payform">
									<input type="hidden" name="pay_token" value="{{ csrf_token() }}">
									@foreach ($payments as $payment)
										<img src="{{$payment->image}}"/> {{$payment->type}} :<input type="radio" class="form-control" name="payment" value="{{$payment->id}}">
									@endforeach
									<button>Valider</button>
								</form>
							</div>
						  </div>
						</div>
					  </div> 
				</div>	
			 	
			  

				 
					<a href="saveorder/{{$idcart}}" class="saveorder">Valider</a>
					<input type="hidden" name="cartid" id="cartid" value="{{$idcart}}">
		 
				

            </div>
            <div class="col-sm-5">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>${{Cart::total()}}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="{{url('clear-cart')}}">Clear Cart</a>
                    <a class="btn btn-default check_out" href="{{url('checkout')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
