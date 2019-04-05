@extends('layout.layout')

@section('content')
    <h1>Modifier département</h1>
    <hr>

    <div class="row mt">
      <div class="col-12">
        <div class="form-panel">
          <form action="{{url('/admin/departments', [$department->id])}}" method="POST">
           <input type="hidden" name="_method" value="PUT">
           {{ csrf_field() }}
            <div class="form-group">
              <label for="dprtname">Nom départment</label>
              <input type="text" value="{{$department->dprtname}}" class="form-control" id="dprtname"  name="dprtname" >
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