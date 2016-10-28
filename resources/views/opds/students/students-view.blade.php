@extends('layouts.master-admin')
@section('title', "Ver Estudiante :" . $student->nombre)
@section('description', 'Ver estudiante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'opd estudiantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'estudiante ver')

@section('content')
<!-- Perfil -->
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Estudiante</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		@if(Session::has('message'))
			<div class="col-sm-12 message success">
					{{ Session::get('message') }}
			</div>
	  @endif
		<h2>{{$student->nombre_completo}}</h2>
		<p>{{$student->matricula}}</p>
		<p>{{$student->curp}}</p>
    <p>{{$student->carrera}}</p>
    <p>{{$student->status}}</p>
		<p>Creado: {{date('d-m-Y', strtotime($student->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($student->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("tablero-opd/estudiante/editar/{$student->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("tablero-opd/estudiante/eliminar/{$student->id}")}}" class="btn danger" onclick = "return confirm('¿Estás seguro?')">Eliminar</a></p>
	</div>
</div>
@endsection
