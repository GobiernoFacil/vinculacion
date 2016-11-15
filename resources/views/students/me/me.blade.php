@extends('layouts.master-admin')
@section('title', 'Mi perfil')
@section('description', 'Mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'student me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'me')

@section('content')
<div class="row">
	@if(Session::has('message'))
		<div class="col-sm-12 message success">
				{{ Session::get('message') }}
		</div>
@endif
	<div class="col-sm-12">
	@if(!$user->enabled)
			@include('students.alert-message')
		@endif
	</div>
	<div class="col-sm-12">
		<h1>Mi Perfil</h1>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<!-- Perfil -->
		<h2><i class="material-icons">person</i> {{$student->user->name ? $student->user->name : 'Sin información' }} {{$student->user->name == '(ಠ_ಠ) mi nombre es...' ? 'Agrega tu nombre' : ''}}</h2>
		<ul class="list_perks">
			<li><strong>Carrera</strong>: {{$student->carrera ? $student->carrera : "Sin información"}}</li>
			<li><strong>Universidad</strong>: <a href="{{ url('tablero-estudiante/universidad') }}">{{$student->opd->opd_name}}</a></li>
			<li><strong>Correo</strong>: {{$student->user->email ? $student->user->email : "Sin información"}}</li>
			<li><strong>CURP</strong>: {{$student->curp ? $student->curp : "Sin información"}}</li>
		</ul>
		<p>Actualizado: {{date('d-m-Y', strtotime($student->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url('tablero-estudiante/yo/editar')}}" class="btn">Editar Perfil</a></p>
	</div>
</div>
@endsection
