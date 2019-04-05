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
                <th scope="col">Nom </th> 
                <th scope="col">email </th> 
                <th scope="col">Tel </th>
                <th scope="col">Poste </th> 
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($employees as $employee)
              <tr>
                <td scope="row">{{$employee->id}}</td>
                <td><a href="/admin/employees/{{$employee->id}}">{{$employee->name}}</a></td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->jobtitle}}</td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('/admin/employees/' . $employee->id . '/edit') }}">
                    	<button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
                    <form action="{{url('/admin/employees', [$employee->id])}}" method="POST">
            					<input type="hidden" name="_method" value="DELETE">
           						<input type="hidden" name="_token" value="{{ csrf_token() }}">
           						<input type="submit" class="btn btn-danger" value="Delete"/>
           				  </form>
                  </div>
  			        </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
          <a href="/admin/employees/create" class="btn btn-primary">Créer un employée</a>
      </div>
    </div>
@endsection