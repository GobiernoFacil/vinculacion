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
	<p>
		<div class="col-sm-3 col-sm-offset-9">
			<p><a href="{{url("dashboard/estudiante/crear")}}" class="btn add"> + Agregar Estudiante</a></p>
		</div>

	</p>
	@if(Session::has('message'))
		<div class="col-sm-12 message success">
				{{ Session::get('message') }}
		</div>
@endif
	<div class="col-sm-12">
	@if($students->count())
	  <ul class="list">
	  	<li class="clearfix titles">
	  	  	<span class="col-sm-2 col-xs-3 ">Matricula</span>
	  	  	<span class="col-sm-2 col-xs-6">Nombres</span>
	  	  	<span class="col-sm-2 nomobile">Email</span>
	  	  	<span class="col-sm-3 col-xs-3">Universidad</span>
					<span class="col-sm-3 col-xs-3">Acciones</span>
	  	</li>
	  @foreach($students as $student)
	    <li class="clearfix">
			<span class="col-sm-2 col-xs-3">{{$student->matricula}}</span>
	    	<span class="col-sm-2 col-xs-6"><a href="{{url("dashboard/estudiante/{$student->id}")}}"> {{$student->nombre}}</a><br>
	    	<span class="note">Actualizado: {{date('d-m-Y', strtotime($student->updated_at))}}</span></span>
			@if(!empty($student->email))
			<span class="col-sm-2 nomobile">{{$student->email}}</span>
			@else
			<span class="col-sm-2 nomobile">Sin correo</span>
			@endif
			<span class="col-sm-3 col-xs-3">{{$student->opd['opd_name']}}</span>
			<span class="col-sm-3 col-xs-3">
				<a href="{{url("dashboard/estudiante/editar/{$student->id}")}}" class="btn xs">Editar</a>
				<a href="{{url("dashboard/estudiante/eliminar/{$student->id}")}}" class="btn danger xs" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
			</span>
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
