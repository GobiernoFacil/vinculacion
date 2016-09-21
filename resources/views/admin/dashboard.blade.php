@extends('layouts.master-admin')
@section('title', 'Dashboard Empleo Abierto')
@section('description', 'Dashboard Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'dashboard')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>Panel de control</h1>
	</div>
</div>
<div class="row">
	<!-- Admins -->
	<div class="col-sm-4">
		<div class="box">
			<h4>Usuarios Administradores</h4>
			@if($admins > 0 )
			<h5><span>{{$admins}}</span></h5>
			@else
			<h4>Eres el único administrador</h4>
			@endif
		</div>
		<p><a href="{{url("dashboard/administradores")}}">Administradores</a></p>
	</div>
	<!-- Universidades -->
	<div class="col-sm-4">
		<div class="box">
			<h4>Universidades</h4>
			@if($opds > 0 )
			<h5><span>{{$opds}}</span></h5>
			@else
			<h4>No hay universidades</h4>
			@endif
		</div>
		<p><a href="{{url("dashboard/opds")}}">Universidades</a></p>
	</div>
	<!-- Estudiantes -->
	<div class="col-sm-4">
		<div class="box">
			<h4>Estudiantes</h4>
			@if($students > 0 )
			<h5><span>{{$students}}</span></h5>
			@else
			<h4>No hay estudiantes</h4>
			@endif
		</div>
		<p><a href="{{url("dashboard/estudiantes")}}">Estudiantes</a></p>
	</div>
	<!-- Empresas -->
	<div class="col-sm-4">
		<div class="box">
			<h4>Empresas</h4>
			@if($companies > 0 )
			<h5><span>{{$companies}}</span></h5>
			@else
			<h4>No hay empresas</h4>
			@endif
		</div>
		<p><a href="{{url("dashboard/empresas")}}">Empresas</a></p>
	</div>
	<!-- Chambers -->
	<div class="col-sm-4">
		<div class="box">
			<h4>Cámaras</h4>
			@if($chambers > 0 )
			<h5><span>{{$chambers }}</span></h5>
			@else
			<h4>No hay cámaras registradas</h4>
			@endif
		</div>
		<p><a href="{{url("dashboard/camaras")}}">Cámaras</a></p>
	</div>
</div>

@endsection