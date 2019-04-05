@extends('layout.layout')

@section('content')
    <h1>Ajouter un Article</h1>
    <hr>

    <div class="row mt">
      <div class="col-12">
        <div class="form-panel">
          <form action="/admin/posts" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" value="" class="form-control" id="title"  name="title" >
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" id="description"  name="description" >

              </textarea>
            </div>
            <div class="form-group">
              <label for="idcat">Catégories</label>
              <select id="idcat" name="idcat">
              @foreach ($postscategories as $postscategorie)
                <option value="{{$postscategorie->id}}" >{{$postscategorie->catname}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control-file" name="image" id="fileimage" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
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