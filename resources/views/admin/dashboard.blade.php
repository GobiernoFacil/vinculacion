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
			<span>{{$user->type ==="superAdmin" ? 'No hay administradores' : 'Eres el único administrador'}}</span>
			@endif
		</a>
	</div>
	<!-- SECOTRADE -->
	@if($user->type ==="superAdmin")
	<div class="col-sm-4">
		<a class="box" href="{{url('dashboard/secotrade')}}">
			<span><strong>Usuarios SECOTRADE</strong></span>
			@if($secotrade > 0 )
			<span class="count">{{$secotrade}}</span>
			@else
			<span>No hay usuarios</span>
			@endif
		</a>
	</div>
	@endif
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
	<!-- Vacantes -->
	<div class="col-sm-4">
		<a class="box" href="{{url('dashboard/vacantes')}}">
			<span><strong>Vacantes</strong></span>
			@if($vacancies > 0 )
			<span class="count">{{$vacancies}}</span>
			@else
			<span>No hay vacantes</span>
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
	<!-- Convenios -->
	<div class="col-sm-4">
		<a class="box" href="{{url('dashboard/opds/convenios')}}">
			<span><strong>Convenios</strong></span>
			@if($contracts > 0 )
			<span class="count">{{$contracts}}</span>
			@else
			<span>No hay convenios registrados</span>
			@endif
		</a>
	</div>
</div>

<!-- datos abiertos -->
<div class="row">
	<div class="col-sm-6">
	<div class="separator"></div>
	<h2>Datos Abiertos</h2>
	@if($busy)
	  <p>Se están generando los datos abiertos. En unos minutos estarán disponibles.
	  (puedes recargar la página para revisar si están listos)</p>
	@elseif(!$openData->count())
	  <p><a href="{{url('dashboard/datos-abiertos/generar')}}" class="btn">Generar datos abiertos</p>
	@else
	  <p><a href="{{url('dashboard/datos-abiertos/actualizar')}}"  class="btn">Actualizar datos abiertos</p>
	@endif
	</div>
</div>

@endsection
