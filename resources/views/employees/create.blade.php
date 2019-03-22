@extends('layout.layout')

@section('content')
    <h1>Ajouter Employé</h1>
    <hr>
    <form action="/employees" method="POST" enctype="multipart/form-data">
     {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" value="" class="form-control" id="name"  name="name" >
      </div>
      <div class="form-group">
        <label for="birthdate">Date de naissance</label>
        <input type="text" value="" class="form-control" id="birthdate"  name="birthdate" >
      </div>
      <div class="form-group">
        <label for="workdate">Date d'emploi</label>
        <input type="text" value="" class="form-control" id="workdate"  name="workdate" >
      </div>
      <div class="form-group">
        <label for="iddprt">Département</label>
        <select id="iddprt" name="iddprt">
        @foreach ($departments as $department)
          <option value="{{$department->id}}" >{{$department->dprtname}}</option>
        @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" value="" class="form-control" id="email"  name="email" >
      </div>
      <div class="form-group">
        <label for="phone">Tel</label>
        <input type="text" value="" class="form-control" id="phone"  name="phone" >
      </div>
      <div class="form-group">
        <label for="filecv">CV</label>
        <input type="file" class="form-control-file" name="cv" id="filecv" aria-describedby="fileHelp">
        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
      </div>
      <div class="form-group">
        <label for="jobtitle">Poste</label>
        <input type="text" value="" class="form-control" id="jobtitle"  name="jobtitle" >
      </div>
      <div class="form-group">
        <label for="salary">Salaire</label>
        <input type="text" value="" class="form-control" id="salary"  name="salary" >
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
@endsection