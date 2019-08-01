@extends('layout.layout')

@section('content')
    <h1>Ajouter une tâche</h1>
    <hr>

    <div class="row mt">
      <div class="col-12">
        <div class="form-panel">
          <form action="/admin/tasks" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" value="" class="form-control" id="title"  name="title" >
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" id="description"  name="description" >

              </textarea>
            </div>
            <div class="form-group">
              <label for="idcat">Exigence</label>
				<textarea class="form-control" id="requirement"  name="requirement" >

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