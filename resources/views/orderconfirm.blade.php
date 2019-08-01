@extends('layout.front')

@section('contentfront') 

<section id="do_action">
    <div class="container">
 
        <div class="row">
        	@section('title')
				<section id="pagetitle">
				    <div class="container">
				        <h2>Page confirmation commande</h2>
				    </div>
				</section>
			@endsection 
            <div class="col-sm-12 order-confirmation">
                <p>Votre commande {{$orderref}} a bien été envoyé ! un email vous a été envoyer.</p>	
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
