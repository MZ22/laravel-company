  @extends('layout.layout')

@section('content')
<div class="container">    
    <div class="row">
	    <div class="col-12">
		    <div class="jumbotron text-left">
		    	<h1>Post</h1>

		        <p>
		            <strong>Id :</strong> {{ $post->id }}
		        </p>
		        <p>
		            <strong>Title :</strong> {{ $post->title }}
		        </p>
		        <p>
		            <strong>Description :</strong> {{ $post->description }}
		        </p>
		        <p>
		            <strong>Image :</strong> 
		        </p>
		        <img src="{{ $post->image }}" >
		        

		    </div>
	    </div>
    </div>
</div>
@endsection