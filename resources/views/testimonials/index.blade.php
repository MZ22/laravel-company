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
              <th scope="col">Nom</th> 
			  <th scope="col">Texte</th> 
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($testimonials as $testimonial)
            <tr>
              <td scope="row">{{$testimonial->id}}</td>
              <td><a href="/admin/testimonials/{{$testimonial->id}}">{{$testimonial->name}}</a></td>
              <td>{{$testimonial->created_at->toFormattedDateString()}}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('/admin/testimonials/' . $testimonial->id . '/edit') }}">
                    <button type="button" class="btn btn-warning">Editer</button>
                  </a>&nbsp;
                  <form action="{{url('/admin/testimonials', [$testimonial->id])}}" method="POST">
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
      <a href="/admin/testimonials/create" class="btn btn-primary">Créer un testimonial</a>
    </div>
  </div>
@endsection