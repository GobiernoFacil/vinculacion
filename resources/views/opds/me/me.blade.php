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

		<p>{{$user->email}}</p>
    <p>{{$opd->address}}</p>
    <p>{{$opd->zip}}</p>
    <p>{{$opd->city}}</p>
    <p>{{$opd->state}}</p>
    <p>{{$opd->url}}</p>
	</div>
	<div class="col-sm-4 col-sm-offset-1">
		<p><a href="{{url('tablero-opd/yo/editar')}}" class="btn">Editar Perfil</a></p>
	</div>
</div>
@endsection
