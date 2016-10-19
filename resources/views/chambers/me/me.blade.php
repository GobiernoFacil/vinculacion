@extends('layouts.master-admin')
@section('title', 'Mi perfil')
@section('description', 'Mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'chamber me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'me')

@section('content')
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<!-- Perfil -->
		<h1>{{$user->name ? $user->name : 'Sin información' }}</h1>
		<p><strong>Correo</strong>: {{$user->email ? $user->email : "Sin información"}}</p>
		<p><strong>Nombre Comercial</strong>: {{$chamber->chamber_comercial_name ? $chamber->chamber_comercial_name : "Sin información"}}</p>
		<p><strong>RFC</strong>: {{$chamber->chamber_rfc ? $chamber->chamber_rfc : "Sin información"}}</p>
	</div>
	<div class="col-sm-4 col-sm-offset-1">
		<p><a href="{{url('tablero-camara/yo/editar')}}" class="btn">Editar Perfil</a></p>
	</div>
</div>
@endsection
