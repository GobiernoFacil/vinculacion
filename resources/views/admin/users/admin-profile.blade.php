@extends('layouts.master-admin')
@section('title', 'Perfil de  ' . $admin->name)
@section('description', 'Perfil de usuario administrador')
@section('bodyclass', 'users')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'user-view')

@section('content')
<!-- Perfil -->
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Perfil de administrador</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$admin->name}}</h2>
		<p>{{$admin->email}}</p>
		<p>{{$admin->enabled == 0 ? "Deshabilitado" : "Habilitado"}}</p>
		<p>Creado: {{date('d-m-Y', strtotime($admin->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($admin->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("dashboard/administrador/editar/{$admin->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("dashboard/administrador/eliminar/{$admin->id}")}}" class="btn danger">Eliminar</a></p>
	</div>
</div>
@endsection
