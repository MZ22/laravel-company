@extends('layout.layout')

@section('content')
    <h1>Modifier catégorie</h1>
    <hr>

    <div class="row mt">
      <div class="col-12">
        <div class="form-panel">  
          <form action="{{url('/admin/categories', [$category->id])}}" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="_method" value="PUT">
           {{ csrf_field() }}
            <div class="form-group">
              <label for="catname">Catégorie</label>
              <input type="text" value="{{$category->catname}}" class="form-control" id="catname"  name="catname" >
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