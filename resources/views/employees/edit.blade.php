@extends('layout.layout')

@section('content')
    <h1>Modifier Employé</h1>
    <hr>
    <form action="{{url('employees', [$employee->id])}}" method="POST">
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
        <label for="cv">CV</label>
        <input type="text" value="{{$employee->cv}}" class="form-control" id="cv"  name="cv" >
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
@endsection