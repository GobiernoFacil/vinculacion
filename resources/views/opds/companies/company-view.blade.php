@extends('layouts.master-admin')
@section('title', 'Ver Empresa')
@section('description', 'Ver empresa en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'opd empresas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'empresa ver')

@section('content')
<!-- Perfil -->
<div class="row">
	@if(Session::has('message'))
		<div class="col-sm-12 message success">
				{{ Session::get('message') }}
		</div>
@endif
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Empresa</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$company->rfc}}</h2>
		<p>{{$company->razon_social}}</p>
		<p>{{$company->nombre_comercial}}</p>
		<p>{{$company->address}}</p>
		<p>Creado: {{date('d-m-Y', strtotime($company->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($company->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("tablero-opd/empresa/editar/{$company->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("tablero-opd/empresa/eliminar/{$company->id}")}}" class="btn danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a></p>
	</div>
</div>
@endsection
