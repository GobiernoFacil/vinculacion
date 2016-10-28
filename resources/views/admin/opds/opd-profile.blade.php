@extends('layouts.master-admin')
@section('title', 'Universidad: ' . $opd->opd_name)
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
		@if(Session::has('message'))
	    <div class="col-sm-12 message success">
	        {{ Session::get('message') }}
	    </div>
	@endif
		<h2>{{$opd->opd_name}}</h2>
		<p>{{$opd->city}}, {{$opd->state}}</p>
		<p>{{$opd->url}}</p>
		<p><strong>Email:</strong> {{!empty($opd->user->email) ? $opd->user->email : "Sin información" }}</p>
		@if($opd->user)
		<p>{{$opd->user->enabled == 0 ? "Deshabilitado" : "Habilitado"}}</p>
		@endif
		<p>Creado: {{date('d-m-Y', strtotime($opd->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($opd->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("dashboard/opd/editar/{$opd->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("dashboard/opd/eliminar/{$opd->id}")}}" class="btn danger" onclick ="return confirm('¿Estás seguro?')">Eliminar</a></p>
	</div>
</div>
@endsection
