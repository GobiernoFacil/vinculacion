@extends('layouts.master-admin')
@section('title', 'Ver Convenio')
@section('description', 'Ver convenio de Universidad del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opds contrato')

@section('content')
<!-- Perfil -->
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Convenio</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$contract->contract_name}}</h2>
		<p>{{$contract->contract_opd}}</p>
		<p>{{$contract->contract_objective}}</p>
		<p>{{$contract->contract_description}}</p>
		<p>Creado: {{date('d-m-Y', strtotime($contract->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($contract->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("dashboard/convenio/editar/{$opd->id}/{$contract->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("dashboard/convenio/eliminar/{$opd->id}/{$contract->id}")}}" class="btn danger" onclick = "return confirm('¿Estás seguro?')">Eliminar</a></p>
	</div>
</div>
@endsection
