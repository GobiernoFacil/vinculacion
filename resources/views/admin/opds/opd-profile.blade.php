@extends('layouts.master-admin')
@section('title', 'Universidad: ' . $opd->opd->name)
@section('description', 'Universidad')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opd-view')

@section('content')
<!-- Perfil -->
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Universidad</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$opd->opd->opd_name}}</h2>
		<p>{{$opd->opd->city}}, {{$opd->opd->state}}</p>
		<p>{{$opd->opd->url}}</p>
		<p><strong>Email:</strong> {{$opd->email}}</p>
		<p>{{$opd->enabled == 0 ? "Deshabilitado" : "Habilitado"}}</p>
		<p>Creado: {{date('d-m-Y', strtotime($opd->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($opd->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("dashboard/opd/editar/{$opd->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("dashboard/opd/eliminar/{$opd->id}")}}" class="btn danger">Eliminar</a></p>
	</div>
</div>
@endsection
