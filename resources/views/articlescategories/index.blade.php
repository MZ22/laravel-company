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
                <th scope="col">Catégorie</th> 
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($postsCategories as $postsCategorie)
              <tr>
                <td scope="row">{{$postsCategorie->id}}</td>
                <td><a href="/admin/categories/{{$postsCategorie->id}}">{{$postsCategorie->catname}}</a></td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('/admin/categories/' . $postsCategorie->id . '/edit') }}">
                    	<button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
                    <form action="{{url('/admin/categories', [$postsCategorie->id])}}" method="POST">
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
          <a href="/admin/categories/create" class="btn btn-primary">Créer une catégorie</a>
      </div>
    </div>
@endsection