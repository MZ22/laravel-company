@extends('layout.layout')

@section('content')
    <h1>Modifier Employé</h1>
    <hr>

    <div class="row mt">
      <div class="col-12">
        <div class="form-panel">  
          <form action="{{url('/admin/employees', [$employee->id])}}" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="_method" value="PUT">
           {{ csrf_field() }}
            <div class="form-group">
              <label for="name">Nom</label>
              <input type="text" value="{{$employee->name}}" class="form-control" id="name"  name="name" >
            </div>
            <div class="form-group">
              <label for="birthdate">Date de naissance</label>
              <input type="text" value="{{$employee->birthdate}}" class="form-control" id="birthdate"  name="birthdate" >
            </div>
            <div class="form-group">
              <label for="workdate">Date d'emploi</label>
              <input type="text" value="{{$employee->workdate}}" class="form-control" id="workdate"  name="workdate" >
            </div>
            <div class="form-group">
              <label for="iddprt">Département</label>
              <select id="iddprt" name="iddprt">
              @foreach ($departments as $department)
                <option value="{{$department->id}}" @if($department->id === $employee->iddprt) selected @endif>{{$department->dprtname}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" value="{{$employee->email}}" class="form-control" id="email"  name="email" >
            </div>
            <div class="form-group">
              <label for="phone">Tel</label>
              <input type="text" value="{{$employee->phone}}" class="form-control" id="phone"  name="phone" >
            </div>
            <div class="form-group">
              <label for="filecv">CV</label>
              <input type="file" class="form-control-file" name="cv" id="filecv" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Please upload a valid pdf file. Size of pdf should not be more than 2MB.</small>
              <a href="{{$employee->cv}}" target="_blank">CV</a>
            </div>

            <div class="form-group">
              <label for="filecv">Image</label>
              <input type="file" class="form-control-file" name="image" id="fileimage" aria-describedby="imageHelp">
              <small id="imageHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
              @if ($employee->image)
                <img src="{{$employee->image}}">
              @else
                <img src="/storage/files/default.jpg">
              @endif
            </div>

            <div class="form-group">
              <label for="jobtitle">Poste</label>
              <input type="text" value="{{$employee->jobtitle}}" class="form-control" id="jobtitle"  name="jobtitle" >
            </div>
            <div class="form-group">
              <label for="salary">Salaire</label>
              <input type="text" value="{{$employee->salary}}" class="form-control" id="salary"  name="salary" >
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