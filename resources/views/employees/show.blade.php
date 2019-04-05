  @extends('layout.layout')

@section('content')
<div class="container">    
    <div class="row">
	    <div class="col-12">
		    <div class="jumbotron text-left">
		    	<h1>Employee</h1>

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
		            <strong>Départment :</strong> {{ $department }}
		        </p>
		        <p>
		            <strong>Email :</strong> {{ $employee->email }}
		        </p>
		        <p>
		            <strong>Tel :</strong> {{ $employee->phone }}
		        </p>
		        <p>
		            <strong>CV :</strong> <a href="{{ $employee->cv }}" target="_blank">{{ $employee->name }}</a>	
		        </p>
		        <p>
		            <strong>Poste :</strong> {{ $employee->jobtitle }}
		        </p>
		        <p>
		            <strong>Salaire :</strong> {{ $employee->salary }}
		        </p>
		        <p>
		            <strong>Image :</strong> 
		        </p>
		        <img src="{{ $employee->image }}">
		    </div>
	    </div>
    </div>
</div>
@endsection