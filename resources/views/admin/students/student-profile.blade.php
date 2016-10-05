@extends('layouts.master-admin')
@section('title', 'Universidad: ' . $student->name)
@section('description', 'Universidad')
@section('bodyclass', 'estudiantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'student-view')

@section('content')
<!-- Perfil -->
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<h2>{{$student->name}}</h2>
	</div>
	<div class="col-sm-8 col-sm-offset-1">
		<!--carrera-->
		<h3><strong>Estudiante o egresado</strong> de Ingeniería en Mecatrónica</h3>
		<p><a href="#">Universidad Tecnológica de Huejotzingo</a></p>
		<ul class="row list_data">
			<li class="col-sm-6"><i class="material-icons">email</i> {{$student->email}}</li>
			<li class="col-sm-3">{{$student->enabled == 0 ? "Deshabilitado" : "Habilitado"}}</li>
			<li class="col-sm-3 right"><span>Creado:</span> {{date('d-m-Y', strtotime($student->created_at))}}<br>
			<span>Actualizado:</span> {{date('d-m-Y', strtotime($student->updated_at))}}</li>
		</ul>
	</div>
	<div class="col-sm-2">
		<p><a href="{{url("dashboard/estudiante/editar/{$student->id}")}}" class="btn">Editar</a></p>
		<p><a href="{{url("dashboard/estudiante/eliminar/{$student->id}")}}" class="btn danger">Eliminar</a></p>
	</div>
</div>
<div class="separator"></div>

<!--CV-->
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<h2>CV</h2>
	</div>
</div>
@endsection
