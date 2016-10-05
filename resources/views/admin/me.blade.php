@extends('layouts.master-admin')
@section('title', 'Mi perfil')
@section('description', 'Mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'me')

@section('content')
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<!-- Perfil -->
		<h1>{{$user->name}}</h1>
		
		<p>{{$user->email}}</p>
	</div>
	<div class="col-sm-4 col-sm-offset-1">
		<p><a href="{{url('dashboard/yo/editar')}}" class="btn">Editar Perfil</a></p>
	</div>
</div>
@endsection