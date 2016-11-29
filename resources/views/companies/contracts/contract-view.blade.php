@extends('layouts.master-admin')
@section('title', 'Convenios con Universidades en la plataforma Empleo Abierto')
@section('description', 'Convenios en la plataforma Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company convenios')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'convenios')

@section('content')
<!-- Perfil -->
<div class="row">

	@if(Session::has('message'))
		<div class="col-sm-12 message success">
				{{ Session::get('message') }}
		</div>
@endif
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Convenio</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$contract->contract_name}}</h2>
    <ul class="list_perks">
			<li><strong>Universidad:</strong> {{$contract->contract_opd}}</li>
      <li><strong>Objetivo:</strong> {{$contract->contract_objective}}</li>
      <li><strong>Descripción:</strong> {{$contract->contract_description}}</li>
			<li><strong>Creado:</strong> {{date('d-m-y',strtotime($contract->created_at))}}</li>
			<li><strong>Actualizado:</strong> {{date('d-m-y',strtotime($contract->updated_at))}}</li>
		</ul>
    <h3>Responsable</h3>
		<ul class="list_perks">
			<li>{{!empty($contract->contract_responsable_name) ? $contract->contract_responsable_name : "Sin responsable"}}</li>
			<li><strong>Email</strong>: {{!empty($contract->contract_responsable_email) ? $contract->contract_responsable_email : "Sin correo de contacto"}}</li>
		</ul>
	</div>
</div>
@endsection
