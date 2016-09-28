@extends('layouts.master-admin')
@section('title', 'Universidad: ' . $student->name)
@section('description', 'Universidad')
@section('bodyclass', 'estudiantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'student-view')

@section('content')
<!-- Perfil -->
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Estudiante</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$student->name}}</h2>
		<p>{{$student->email}}</p>
		<p>{{$student->enabled == 0 ? "Deshabilitado" : "Habilitado"}}</p>
		<p>Creado: {{date('d-m-Y', strtotime($student->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($student->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("dashboard/opd/editar/{$student->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("dashboard/op/eliminar/{$student->id}")}}" class="btn danger">Eliminar</a></p>
	</div>
</div>
@endsection
