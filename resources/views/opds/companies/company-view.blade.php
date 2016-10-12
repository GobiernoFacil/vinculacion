@extends('layouts.master-admin')
@section('title', 'Ver Empresa')
@section('description', 'Ver empresa en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'opd empresas')

@section('content')
<!-- Perfil -->
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Empresa</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$company->name}}</h2>
		<p>{{$company->email}}</p>
		<p>Creado: {{date('d-m-Y', strtotime($company->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($company->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("tablero-opd/empresa/editar/{$company->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("tablero-opd/empresa/eliminar/{$company->id}")}}" class="btn danger">Eliminar</a></p>
	</div>
</div>
@endsection
