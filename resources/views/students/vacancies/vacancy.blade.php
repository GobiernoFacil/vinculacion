@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'vacante ver')

@section('content')
<div class="row">
    <div class="col-sm-12">
    @if(!$user->enabled)
    	<!--- alert--->
    	@include('companies.alert-message')
    @endif
    </div>
    <div class="col-sm-9">
	    <!--title-->
    	<h1>{{$vacancy->job}}</h1>
	    <!--info-->
    	<div class="row">
	    	<div class="col-sm-6">
				<p>Creado: {{date('d-m-Y', strtotime($vacancy->created_at))}} - Actualizado: {{date('d-m-Y', strtotime($vacancy->updated_at))}}</p>
	    	</div>
			<!--location-->
	    	<div class="col-sm-6">
	    		<p class="right">Ubicación: {{$vacancy->city . ', ' . $vacancy->state}}</p>
	    	</div>
    	</div>
    </div>
    <!--aplicar-->
    <div class="col-sm-3">
	@if($user->enabled)
    	@if($applied)
		<p><a href="{{url("tablero-estudiante/vacante/declinar/{$vacancy->id}")}}" class="btn">Declinar aplicación</a></p>
		@else
		<p><a href="{{url("tablero-estudiante/vacante/aplicar/{$vacancy->id}")}}" class="btn">Aplicar</a></p>
		@endif
    @else
    	<div class="box">
    	<p>Para aplicar a la vacante, debe habilitarte tu universidad: <strong>{{$user->student->opd->opd_name}}</strong>.</p>
    	<ul class="list_perks">
			<li>contacto : {{$user->student->opd->contact->name}}</li>
			<li>teléfono : {{$user->student->opd->contact->phone}}</li>
			<li>correo   : {{$user->student->opd->contact->email}}</li>
    	</ul>
    	</div>
    @endif
    </div>
</div>

<div class="separator"></div>

<!-- more info-->
<div class="row">
	<div class="col-sm-4">
		<h3>Carrera: {{$vacancy->tags}}</h3>
		<p>Especialidad: {{$vacancy->speciality}}</p>
	</div>
	<div class="col-sm-4">
		<h3>Sueldo: ${{number_format($vacancy->salary,2, '.', ',')}}</h3>
		<p>Tipo de salario: {{$vacancy->salary_type}}</p>
	</div>
	<div class="col-sm-4">
		<h6>Empresa</h6>
		<div class="row">
			<div class="col-sm-3">
				<img src="{{!empty($vacancy->company->logo) ? url('img/logos/'. $vacancy->company->logo) : url('img/logos/default.png') }}">
			</div>
			<div class="col-sm-9">
				<h3>{{$vacancy->company->nombre_comercial}}</h3>
			</div>
		</div>
	</div>
</div>

<!-- Requisitos / beneficios-->
<div class="row">
	<div class="col-sm-6">
	  <h3 class="separator">Requisitos</h3>
	  <p>Descripción:</p>
	  <ul class="list_perks">
		  <li><strong>Experiencia</strong>: {{$vacancy->experience}}</li>
		  <li><strong>Edad</strong>: {{$vacancy->age_from . ' - ' . $vacancy->age_to}}</li>
		  <li><strong>Personalidad</strong>: {{$vacancy->personality	  }}</li>
		  <li><strong>Horario</strong>: {{$vacancy->work_from}} - {{$vacancy->work_to }}</li>
		  <li>{{$vacancy->travel == 1 ? 'Disponibilidad para viajar requerida.' : 'Disponibilidad para viajar no requerida.'}}</li>
		  <li>{{$vacancy->location == 1 ? 'Posibilidad de cambio de domicilio requerida.' : 'Posibilidad de cambio de domicilio no requerida.'}}</li>
	  </ul>
	</div>
	<div class="col-sm-6">
	  <h3 class="separator">Ofrecemos</h3>
	  <ul class="list_perks">
	  	<li><strong>Beneficios</strong>: {{$vacancy->benefits		  }}</li>
	  	<li><strong>Gastos Pagados</strong>: {{ $vacancy->expenses }}</li>
	  	<li><strong>Capacitación</strong>: {{$vacancy->training		  }}</li>
	  	<li><strong>Sueldo mínimo</strong>: ${{ number_format($vacancy->salary_min,2, '.', ',') }}</li>
	  	<li><strong>Sueldo máximo</strong>: ${{ number_format($vacancy->salary_max,2, '.', ',') }}</li>
	  	{!! $vacancy->salary_extra ? '<li>' . $vacancy->salary_extra . '</li>' : '' !!}
	  	{!! $vacancy->salary_variable ? '<li>' . $vacancy->salary_variable . '</li>' : '' !!}
	  	{!! $vacancy->contract_level ? '<li>' . $vacancy->contract_level . '</li>' : '' !!}
	  	{!! $vacancy->contract_type ? '<li>' . $vacancy->contract_type . '</li>' : '' !!}	
	  	<li><strong>Más información</strong>: {{$vacancy->url  		  }}</li>
	  </ul>
	</div>
</div>
@endsection