@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company me')

@section('content')
@if(!$user->enabled)
 @include('companies.alert-message')
@endif
<!-- Perfil -->
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Empresa</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$user->company->nombre_comercial}}</h2>
		<p>{{!empty($user->email) ? $user->email : '' }}</p>
		<p>Creado: {{date('d-m-Y', strtotime($user->company->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($user->company->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("dashboard/empresa/editar/{$user->company->id}")}}" class="btn">Editar</a></p>
	</div>
</div>
@endsection
