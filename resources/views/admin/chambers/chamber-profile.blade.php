@extends('layouts.master-admin')
@section('title', $chamber->name)
@section('description', 'Perfil de Cámara en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'chambers')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'chamber-view')

@section('content')
<div class="row">
	<!-- Perfil -->
	<div class="col-sm-12">
		<h4>Perfil de la cámara</h4>
		<h1>{{$chamber->name}}</h1>
	</div>
	<div class="col-sm-8 col-sm-offset-1">
		<ul class="list_perks">
			<li><strong>Nombre</strong>: {{$chamber->name}}</li>
			<li><strong>Correo</strong>: {{$chamber->email}}</li>
			<li><strong>Creado</strong>: {{ date('d-m-Y', strtotime($chamber->created_at))}}</li>
			<li><strong>Actualizado</strong>: {{ date('d-m-Y', strtotime($chamber->updated_at)) }}</li>
			<!-- cosas de la cámara -->
			@if($chamber->has('chamber'))
			  <li><strong>Nombre comercial</strong>: {{$chamber->chamber->chamber_comercial_name}}</li>
			  <li><strong>RFC</strong>: {{$chamber->chamber->chamber_rfc}}</li>
			@endif
		</ul>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("dashboard/camara/editar/{$chamber->id}")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("dashboard/camara/eliminar/{$chamber->id}")}}" class="btn danger">Eliminar</a></p>
	</div>
</div>
@endsection