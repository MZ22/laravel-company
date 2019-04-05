@extends('layout.layout')

@section('content')
    <h1>Ajouter un département</h1>
    <hr>

    <div class="row mt">
      <div class="col-12">
        <div class="form-panel">
          <form action="/admin/testimonials" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="name">Nom </label>
              <input type="text" value="" class="form-control" id="name"  name="name" >
            </div>
			<div class="form-group">
              <label for="text">Text </label>
			  <textarea class="form-control" id="text"  name="text" >
				 
			  </textarea>
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