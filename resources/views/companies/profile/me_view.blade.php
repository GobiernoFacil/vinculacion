@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'me')

@section('content')
@if(!$user->enabled)
 @include('companies.alert-message')
@endif
<!-- Perfil -->
<div class="row">
  	@if(Session::has('message'))
    <div class="col-sm-12 message success">
        {{ Session::get('message') }}
    </div>
	@endif
	<div class="col-sm-4 col-sm-offset-1">
		<h3>Usuario</h3>
		<h2>{{$user->name}}</h2>
		<ul class="list_perks">
			<li>Email: {{$user->email}}</li>
			<li>Creado: {{date('d-m-y',strtotime($user->created_at))}}</li>
			<li>Actualizado: {{date('d-m-y',strtotime($user->updated_at))}}</li>
		</ul>	
		@if($user->enabled == 1)
		<p><a href="{{url('empresa/'. $user->company->id)}}" class="btn edit">Ver perfil público de la empresa</a></p>
		@endif
		<p><a href="{{url("tablero-empresa/yo/editar")}}" class="btn">Editar</a></p>
	</div>
	<div class="col-sm-5">
		<h3>Empresa</h3>
		<div class="row">
			<div class="col-sm-3">
				<p><img src="{{ $user->company->logo ? url('img/logos/'. $user->company->logo) : url('img/logos/default.png')}}"></p>
			</div>
			<div class="col-sm-9">
				<h2>{{$user->company->nombre_comercial}}</h2>
			</div>
		</div>
		<ul class="list_perks">
			<li {!! $user->enabled == 1 ? "class='enabled'" : "class='disabled'" !!}>{{$user->enabled == 1 ? "Habilitada" : "Deshabilitada"}}</li>
			<li><strong>RFC</strong>: {{ $user->company->rfc ? $user->company->rfc : 'Sin RFC'}}</li>
			<li><strong>Razón Social</strong>: {{ $user->company->razon_social ? $user->company->razon_social : 'Sin Razón social'}}</li>
			<li><strong>Dirección</strong>: {{ $user->company->address ? $user->company->address : 'Sin dirección'}}</li>
			<li><strong>C.P.</strong>: {{ $user->company->zip ? $user->company->zip : 'Sin código postal'}}</li>
			<li><strong>Teléfono</strong>: {{ $user->company->phone ? $user->company->phone : 'Sin teléfono'}}</li>
			<li><strong>Email</strong>: {{ $user->company->email ? $user->company->email : 'Sin email'}}</li>
			<li><strong>Giro comercial</strong>: {{ $user->company->giro_comercial ? $user->company->giro_comercial : 'Sin giro comercial'}}</li>
			<li><strong>Alcance</strong>: {{ $user->company->alcance ? $user->company->alcance : 'Sin alcance'}}</li>
			<li><strong>Tipo</strong>: {{ $user->company->type ? $user->company->type : 'Sin tipo de empresa'}}</li>
		</ul>
		<h3>Contacto</h3>
		<ul class="list_perks">
			<li>{{$user->company->contact->name ? $user->company->contact->name : "Sin nombre de contacto"}}</li>
			<li><strong>Email</strong>: {{$user->company->contact->email ? $user->company->contact->email : "Sin correo de contacto"}}</li>
			<li><strong>Teléfono</strong>: {{$user->company->contact->phone ? $user->company->contact->phone : 'Sin teléfono'}}</li>
		</ul>
		<p><a href="{{url("tablero-empresa/yo/editar")}}" class="btn">Editar</a></p>
	</div>
</div>
@endsection