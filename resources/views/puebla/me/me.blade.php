@extends('layouts.master-admin')
@section('title', 'Mi perfil')
@section('description', 'Mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'puebla me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_p', 'me')

@section('content')
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<!-- Perfil -->
		<h1>Dirección general del servicio estatal del empleo</h1>
		<h2>{{$user->name ? $user->name : 'Sin información' }}</h2>
		<p><strong>Correo</strong>: {{$user->email ? $user->email : "Sin información"}}</p>
	</div>
	<div class="col-sm-4 col-sm-offset-1">
		<p><a href="{{url('tablero-secotrade/yo/editar')}}" class="btn">Editar Perfil</a></p>
	</div>
</div>
@endsection
