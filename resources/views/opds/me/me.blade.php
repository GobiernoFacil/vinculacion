@extends('layouts.master-admin')
@section('title', 'Mi perfil')
@section('description', 'Mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'me')

@section('content')
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<!-- Perfil -->
		<h1>{{$user->name}}</h1>
		<h2>{{$opd->city}}, {{$opd->state}}</h2>
		<p><strong>web</strong>: {{$opd->url ? $opd->url : "Sin información"}}</p>
		<p>{{$user->email ? $user->email : "Sin información"}}</p>
		<p><strong>Dirección</strong>: {{$opd->address ? $opd->address : "No se agregó información"}}</p>
		<p><strong>C.P.:</strong> {{$opd->zip ? $opd->zip : "No se agregó información"}}</p>
	</div>
	<div class="col-sm-4 col-sm-offset-1">
		<p><a href="{{url('tablero-opd/yo/editar')}}" class="btn">Editar Perfil</a></p>
	</div>
</div>
@endsection
