@extends('layout.front')

@section('contentfront')
<div id="blog" class="blog-area">
	<div class="blog-inner area-padding">
		<div class="container">
	        
		    <div class="row">
	          <div class="col-12">
	            <div class="section-headline text-center">
	              <h1><strong>Catégorie :</strong> {{ $category->catname }}</h1>
	            </div>
	          </div>
	        </div>

			<div class="row">
	          <!-- Start Left Blog -->
	          @foreach ($posts as $post)
	          <div class="col-4">
	            <div class="single-blog">
	              <div class="single-blog-img">
	                <a href="/posts/{{$post->id}}">
	                  <img src="{{$post->image}}" alt="" width="100%" class="text-center">
	                </a>
	              </div>
	              <div class="blog-meta">
	                <!--span class="comments-type">
	                  <i class="fa fa-comment-o"></i>
	                  <a href="#">13 comments</a>
	                </span-->
	                <span class="date-type">
	                  <i class="fa fa-calendar"></i>{{$post->created_at}}
	                </span>
	              </div>
	              <div class="blog-text">
	                <h4>
	                  <a href="/posts/{{$post->id}}">{{$post->title}}</a>
	                </h4>
	                <p>
	                  {{$post->description}}
	                </p>
	              </div>
	                <span>
	                  <a href="/posts/{{$post->id}}" class="ready-btn">Lire plus</a>
	                </span>
	            </div>
	            <!-- Start single blog -->
	          </div>
	          @endforeach
	          <!-- End Left Blog-->

	        </div>
		</div>
	</div>
</div>
@endsection