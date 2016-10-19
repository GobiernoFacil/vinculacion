@extends('layouts.master-admin')
@section('title', 'Mi perfil')
@section('description', 'Mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'student me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'me')

@section('content')
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		@if(!$user->enabled)
			@include('students.alert-message')
		@endif
		<!-- Perfil -->
		<h1>{{$student->user->name ? $student->user->name : 'Sin información' }}</h1>
		<p><strong>Correo</strong>: {{$student->user->email ? $student->user->email : "Sin información"}}</p>
		<p><strong>Carrera</strong>: {{$student->carrera ? $student->carrera : "Sin información"}}</p>
		<p><strong>CURP</strong>: {{$student->curp ? $student->curp : "Sin información"}}</p>
	</div>
	<div class="col-sm-4 col-sm-offset-1">
		<p><a href="{{url('tablero-estudiante/yo/editar')}}" class="btn">Editar Perfil</a></p>
	</div>
</div>
@endsection
