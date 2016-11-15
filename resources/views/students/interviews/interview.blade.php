@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student entrevistas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'entrevista ver')

@section('content')
<div class="row">
    <div class="col-sm-12">
    @if(!$user->enabled)
    	<!--- alert--->
    	@include('companies.alert-message')
    @endif
    </div>
    <div class="col-sm-12">
	    <!--title-->
    	<h1>Entrevista con {{ $vacancy->company->nombre_comercial }}</h1>
	    	
	    <h2><strong>Vacante:</strong>  <a href="{{ url('tablero-estudiante/vacante/' . $vacancy->id) }}">{{$vacancy->job}}</a></h2>
    	
    </div>
    <div class="col-sm-8 col-sm-offset-1">
	    <!--info-->
	    <ul class="list_perks">
	    	<li><strong>Fecha</strong>: {{$interview->date ? $interview->date : "No hay fecha"}}</li>
	    	<li><strong>Hora</strong>: {{$interview->time ? $interview->time : "No hay hora"}}</li>
	    	<li><strong>Lugar</strong>: {{$interview->address ? $interview->address : "No hay dirección"}}<br>
	    	{{$interview->city ? $interview->city . ', ': ""}} {{$interview->state ? $interview->state : ""}}
	    	</li>
	    	<li><strong>Contacto</strong>: {{$interview->contact ? $interview->contact : "No hay contacto"}}</li>
	    	<li><strong>Email</strong>: {{$interview->email ? $interview->email : "No hay email"}}</li>
	    	<li><strong>Teléfono</strong>: {{$interview->phone ? $interview->phone : "No hay teléfono"}}</li>
	    </ul>
    </div>
    <!--aplicar-->
</div>

@endsection