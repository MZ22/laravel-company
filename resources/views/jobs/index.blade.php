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
                <th scope="col">Titre </th> 
                <th scope="col">Déscription </th> 
                <th scope="col">Exigence </th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tasks as $task)
              <tr>
                <td scope="row">{{$task->id}}</td>
                <td><a href="/admin/tasks/{{$task->id}}">{{$task->title}}</a></td>
                <td>{{$task->description}}</td>
                <td><img src="{{$task->image}}" class="text-center" width="100px"></td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('/admin/tasks/' . $task->id . '/edit') }}">
                    	<button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
                    <form action="{{url('/admin/tasks', [$task->id])}}" method="POST">
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
          <a href="/admin/tasks/create" class="btn btn-primary">Créer un post</a>
      </div>
    </div>
@endsection