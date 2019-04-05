@extends('layout.layout')

@section('content')
    <h1>Ajouter une catégorie</h1>
    <hr>

    <div class="row mt">
      <div class="col-12">
        <div class="form-panel">
          <form action="/admin/categories" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
            <div class="form-group">
              <label for="catname">Catégorie</label>
              <input type="text" value="" class="form-control" id="catname"  name="catname" >
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