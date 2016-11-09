@extends('layouts.master-admin')
@section('title', 'Empresa: ' . $company->nombre_comercial)
@section('description', 'Empresas')
@section('bodyclass', 'empresas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'company-view')

@section('content')
<!-- Perfil -->
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Empresa</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$company->nombre_comercial}}</h2>
		<p>{{!empty($company->user->email) ? $company->user->email : '' }}</p>
		<p>
			
		</p>
		<p>Creado: {{date('d-m-Y', strtotime($company->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($company->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">	
		@if(!empty($company->user))
		  <a href="{{url("dashboard/empresa/habilitar/{$company->id}")}}" class="btn">
			  
		    {{$company->user->enabled == 0 ? "Habilitar" : "Deshabilitar"}}
		  </a>
			@endif
			</div>
	<div class="col-sm-3">
		<p><a href="{{url("dashboard/empresa/editar/{$company->id}")}}" class="btn add">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("dashboard/empresa/eliminar/{$company->id}")}}" class="btn danger">Eliminar</a></p>
	</div>
</div>
@endsection
