@extends('layouts.master-admin')
@section('title', 'Perfil de  ' . $person->name)
@section('description', 'Perfil de usuario SECOTRADE')
@section('bodyclass', 'secotrade')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'secotrade-view')

@section('content')
<!-- Perfil -->
<div class="row">
	@if(Session::has('message'))
	<div class="col-sm-12 message success">
		{{ Session::get('message') }}
	</div>
	@endif
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Perfil de usuario SECOTRADE</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$person->name}}</h2>
		<p>{{$person->email}}</p>
		<p>{{$person->enabled == 0 ? "Deshabilitado" : "Habilitado"}}</p>
		<p>Creado: {{date('d-m-Y', strtotime($person->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($person->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("dashboard/secotrade/editar/{$person->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("dashboard/secotrade/eliminar/{$person->id}")}}" class="btn danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a></p>
	</div>
</div>
@endsection
