  @extends('layout.layout')

@section('content')
    <h1>Départment</h1>

<div class="container">    
    <div class="row">
	    <div class="col-12">
			<div class="jumbotron text-left">
		        <p>
		            <strong>Id départment:</strong> {{ $department->id }}
		        </p>
		        <p>
		            <strong>Nom départment:</strong> {{ $department->dprtname }}
		        </p>
	    	</div>
	    </div>
	</div>
</div>
@endsection