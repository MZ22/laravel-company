@extends('layout.layout')

@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom département</th> 
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($departments as $department)
            <tr>
              <th scope="row">{{$department->id}}</th>
              <td><a href="/departments/{{$department->id}}">{{$department->dprtname}}</a></td>
              <td>{{$department->created_at->toFormattedDateString()}}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('departments/' . $department->id . '/employees') }}">
                  	<button type="button" class="btn btn-warning">Afficher</button>
                  </a>&nbsp;
                  <a href="{{ URL::to('departments/' . $department->id . '/edit') }}">
                    <button type="button" class="btn btn-warning">Editer</button>
                  </a>&nbsp;
                  <form action="{{url('departments', [$department->id])}}" method="POST">
          					<input type="hidden" name="_method" value="DELETE">
         						<input type="hidden" name="_token" value="{{ csrf_token() }}">
         						<input type="submit" class="btn btn-danger" value="Supprimer"/>
         				  </form>
                </div>
			        </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <a href="/departments/create" class="btn btn-primary">Créer un département</a>
    </div>
  </div>
@endsection