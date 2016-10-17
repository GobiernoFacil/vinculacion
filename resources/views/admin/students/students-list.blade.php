@extends('layouts.master-admin')
@section('title', 'Lista de Estudiantes')
@section('description', 'Lista de Estudiantes del Gobierno del Estado de Puebla')
@section('bodyclass', 'estudiantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'estudiantes')

@section('content')
<div class="row">
<!-- Estudiantes -->
	<div class="col-sm-12">
		<h1>Estudiantes</h1>
	</div>
	<div class="col-sm-12">
	@if($students->count())
	  <ul class="list">
	  	<li class="row titles">
	  	  	<span class="col-sm-2">Matricula</span>
	  	  	<span class="col-sm-4">Nombres</span>
	  	  	<span class="col-sm-3">Email</span>
	  	  	<span class="col-sm-3">Universidad</span>
	  	</li>
	  @foreach($students as $student)
	    <li class="row">
			<span class="col-sm-2">{{$student->student->student_registration_id}}</span>
	    	<span class="col-sm-4"><a href="{{url("dashboard/estudiante/{$student->id}")}}"> {{$student->name}}</a><br>
	    	<span class="note">Actualizado: {{date('d-m-Y', strtotime($student->updated_at))}}</span></span>
			<span class="col-sm-3">{{$student->email}}</span>
			<span class="col-sm-3">{{$student->student->opd_id}}</span>

	    </li>
	  @endforeach
	  </ul>
	
	@else
		<p>No hay estudiantes</p>
	@endif
	
	
	{{ $students->links() }}
	</div>
</div>
@endsection