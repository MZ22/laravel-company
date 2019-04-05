@extends('layout.layout')

@section('content')
    <h1>Modifier post</h1>
    <hr>

    <div class="row mt">
      <div class="col-12">
        <div class="form-panel">  
          <form action="{{url('/admin/posts', [$post->id])}}" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="_method" value="PUT">
           {{ csrf_field() }}
            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" value="{{$post->title}}" class="form-control" id="title"  name="title" >
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" id="description"  name="description">
              {{$post->description}}
              </textarea> 
            </div>
            <div class="form-group">
              <label for="idcat">Catégorie</label>
              <select id="idcat" name="idcat">
              @foreach ($postscategories as $postscategorie)
                <option value="{{$postscategorie->id}}" @if($postscategorie->id === $post->idcat) selected @endif>{{$postscategorie->catname}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="fileimage">Image</label>
              <input type="file" class="form-control-file" name="image" id="fileimage" aria-describedby="imageHelp">
              <small id="imageHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
              @if ($post->image)
                <img src="{{$post->image}}">
              @else
                <img src="/storage/files/default.jpg">
              @endif
            </div>

            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <button type="submit" class="btn btn-primary">Sauvgarder</button>
          </form>
        </div>
      </div>
    </div>
@endsection