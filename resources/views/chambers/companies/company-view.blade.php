@extends('layouts.master-admin')
@section('title', 'Ver Empresa')
@section('description', 'Ver empresa en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'chamber empresas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'empresa ver')

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
		<h2>{{$element->company->rfc}}</h2>
		<p>{{$element->company->razon_social}}</p>
		<p>{{$element->company->nombre_comercial}}</p>
		<p>{{$element->company->address}}</p>
		<p>Creado: {{date('d-m-Y', strtotime($element->company->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($element->company->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("tablero-camara/empresa/editar/{$element->company->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("tablero-camara/empresa/eliminar/{$element->company->id}")}}" class="btn danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a></p>
	</div>
</div>
@endsection
