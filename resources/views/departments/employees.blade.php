  @extends('layout.layout')

@section('content')
<div class="container">
            <h1><strong>Départment :</strong> {{ $department->dprtname }}</h1>
    <div class="row">
	    <div class="col-12">
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
		            <strong>CV :</strong> {{ Storage::url($employee->cv) }}	
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