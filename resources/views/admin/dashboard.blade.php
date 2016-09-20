@extends('layouts.master-admin')
@section('title', 'Dashboard Empleo Abierto')
@section('description', 'Dashboard Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'admin')

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
			@if($admins->count())
			<h5><span>{{$admins->count()}}</span></h5>
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
			@if($opds->count())
			<h5><span>{{$opds->count()}}</span></h5>
			@else
			<h4>Eres el único administrador</h4>
			@endif
		</div>
		<p><a href="{{url("dashboard/opds")}}">Universidades</a></p>
	</div>
	<!-- Chambers -->
	<div class="col-sm-4">
		<div class="box">
			<h4>Cámaras</h4>
			@if($chambers->count())
			<h5><span>{{$opds->count()}}</span></h5>
			@else
			<h4>No hay cámaras registradas</h4>
			@endif
		</div>
		<p><a href="{{url("dashboard/camaras")}}">Cámaras</a></p>
	</div>
</div>

@endsection