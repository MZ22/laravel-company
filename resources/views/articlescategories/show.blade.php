  @extends('layout.layout')

@section('content')
<div class="container">    
    <div class="row">
	    <div class="col-12">
		    <div class="jumbotron text-left">
		    	<h1>Catégorie</h1>
					 
		        <p>
		            <strong>Id :</strong> {{$category->id}}
		        </p>
		        <p>
		            <strong>Nom :</strong> {{$category->catname}}
		        </p>        

		    </div>
	    </div>
    </div>
</div>
@endsection