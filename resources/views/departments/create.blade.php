@extends('layout.layout')

@section('content')
    <h1>Ajouter un département</h1>
    <hr>

    <div class="row mt">
      <div class="col-12">
        <div class="form-panel">
          <form action="/admin/departments" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="dprtname">Nom départment</label>
              <input type="text" value="" class="form-control" id="dprtname"  name="dprtname" >
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