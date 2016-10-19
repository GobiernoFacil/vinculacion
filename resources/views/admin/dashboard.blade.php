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
		<a class="box" href="{{url('dashboard/administradores')}}">
			<span><strong>Usuarios Administradores</strong></span>
			@if($admins > 0 )
			<span class="count">{{$admins}}</span>
			@else
			<span>Eres el único administrador</span>
			@endif
		</a>
	</div>
	<!-- Universidades -->
	<div class="col-sm-4">
		<a class="box" href="{{url('dashboard/opds')}}">
			<span><strong>Universidades</strong></span>
			@if($opds > 0 )
			<span class="count">{{$opds}}</span>
			@else
			<span>No hay universidades</span>
			@endif
		</a>
	</div>
	<!-- Estudiantes -->
	<div class="col-sm-4">
		<a class="box" href="{{url('dashboard/estudiantes')}}">
			<span><strong>Estudiantes</strong></span>
			@if($students > 0 )
			<span class="count">{{$students}}</span>
			@else
			<span>No hay estudiantes</span>
			@endif
		</a>
	</div>
	<!-- Empresas -->
	<div class="col-sm-4">
		<a class="box" href="{{url('dashboard/empresas')}}">
			<span><strong>Empresas</strong></span>
			@if($companies > 0 )
			<span class="count">{{$companies}}</span>
			@else
			<span>No hay empresas registradas</span>
			@endif
		</a>
	</div>
	<!-- Chambers -->
	<div class="col-sm-4">
		<a class="box" href="{{url('dashboard/camaras')}}">
			<span><strong>Cámaras</strong></span>
			@if($chambers > 0 )
			<span class="count">{{$chambers}}</span>
			@else
			<span>No hay cámaras registradas</span>
			@endif
		</a>
	</div>
</div>

@endsection