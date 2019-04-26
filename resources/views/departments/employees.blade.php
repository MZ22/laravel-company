  @extends('layout.layout')

@section('content')
<div class="container">
            <h1><strong>Départment :</strong> {{ $department->dprtname }}</h1>
    <div class="row">
	    <div class="col-12">

  		@foreach ($emps as $emp) 
  			<div class="jumbotron text-left">
		        <p>
		            <strong>Id :</strong> {{ $emp["id"] }}
		        </p>
		        <p>
		            <strong>Nom :</strong> {{ $emp["name"] }}
		        </p>
		        <p>
		            <strong>Date de naissance :</strong> {{ $emp["birthdate"] }}
		        </p>
		        <p>
		            <strong>Date d'emploi :</strong> {{ $emp["workdate"] }}
		        </p>
		        <p>
		            <strong>Email :</strong> {{ $emp["email"] }}
		        </p>
		        <p>
		            <strong>Tel :</strong> {{ $emp["phone"] }}
		        </p>
		        <p>
		            <strong>CV :</strong> <a href="{{ $emp['cv'] }}" target="_blank">CV</a>	
		        </p>
		        <p>
		            <strong>Poste :</strong> {{ $emp["jobtitle"] }}
		        </p>
		        <p>
		            <strong>Salaire :</strong> {{ $emp["salary"] }}
		        </p>
		    </div> 
	    @endforeach
	    <p>------------------------------------------------------------</p>
	      @foreach ($employees as $employee)  
		    <div class="jumbotron text-left">
		        <p>
		            <strong>Id :</strong> {{ $employee->id }}
		        </p>
		        <p>
		            <strong>Nom :</strong> {{ $employee->name }}
		        </p>
		        <p>
		            <strong>Date de naissance :</strong> {{ $employee->birthdate }}
		        </p>
		        <p>
		            <strong>Date d'emploi :</strong> {{ $employee->workdate }}
		        </p>
		        <p>
		            <strong>Email :</strong> {{ $employee->email }}
		        </p>
		        <p>
		            <strong>Tel :</strong> {{ $employee->phone }}
		        </p>
		        <p>
		            <strong>CV :</strong> <a href="{{$employee->cv}}" target="_blank">CV</a>	
		        </p>
		        <p>
		            <strong>Poste :</strong> {{ $employee->jobtitle }}
		        </p>
		        <p>
		            <strong>Salaire :</strong> {{ $employee->salary }}
		        </p>
		    </div>
		    @endforeach
	    </div>
    </div>
</div>
@endsection