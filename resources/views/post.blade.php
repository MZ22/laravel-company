 @extends('layout.front')

@section('contentfront')
<div class="area-padding">
	<div class="container">    
	    <div class="row">
		    <div class="col-12">
			    <div class="jumbotron text-left">
			    	<h1>{{ $post->title }}</h1>

			    	<img src="{{ $post->image }}" >

			    	<p>
			    		{{ $post->created_at }}
			    	</p>

			        <p>
			            <strong>Résumé :</strong> 
			        </p>

			        <p>
			        	{{ $post->description }}
			        </p>

			        <p>
			            <strong>Categorie :</strong> 
			        </p>

			        <p>
			        	{{ $category }}
			        </p>
			        
			        <p>
			            <strong>Description :</strong> 
			        </p>

			        <p>
			        	{{ $post->long_description }}
			        </p>
			        

			    </div>
		    </div>
	    </div>
	</div>
</div>
@endsection