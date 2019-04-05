  @extends('layout.layout')

@section('content')
    <h1>Testimonial</h1>

<div class="container">    
    <div class="row">
	    <div class="col-12">
			<div class="jumbotron text-left">
		        <p>
		            <strong>Id:</strong> {{ $testimonial->id }}
		        </p>
		        <p>
		            <strong>Nom:</strong> {{ $testimonial->name }}
		        </p>
				<p>
		            <strong>Text:</strong> {{ $testimonial->text }}
		        </p>
	    	</div>
	    </div>
	</div>
</div>
@endsection