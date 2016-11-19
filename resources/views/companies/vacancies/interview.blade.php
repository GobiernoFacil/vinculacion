@extends('layouts.master-admin')
@section('title', 'Agregar Vacante')
@section('description', 'Agregar nueva vacante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'company vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'vacante entrevista ver')

@section('content')

  <!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      <h1>Entrevista</h1>
    </div>
  </div>
  <div class="row">
  	<div class="col-sm-6">
	  	<h3>Vacante: <a href="{{ url('tablero-empresa/vacante/'. $vacancy->id) }}" class="link_view">{{$vacancy->job}}</a></h3>
  	</div>
  	<div class="col-sm-6">
		<h3>Aspirante: <a href="{{ url('tablero-empresa/vacante/'. $vacancy->id . '/estudiante/' . $interview->student->id ) }}" class="link_view">{{ucwords(strtolower($interview->student->nombre . ' ' . $interview->student->apellido_paterno))}}</a></h3>
		<h5><strong>Fecha</strong>: {{$interview->date}}</h5>
		<h5><strong>Hora</strong>: {{$interview->time}}</h5>
  	</div>
  	
  </div>
  
  <div class="separator"></div>
  
  <div class="row">
  	<div class="col-sm-5">
	  	<h3>Contacto para la entrevista</h3>
		<ul class="list_perks">
			<li><strong>Contacto</strong>: {{$interview->contact}}</li>
			<li><strong>Correo</strong>: {{$interview->email}}</li>
			<li><strong>Teléfono</strong>:{{$interview->phone}}</li>
			<li><strong>Dirección</strong>: {{$interview->address}}</li>
			<li><strong>Ciudad</strong>: {{$interview->city}}</li>
			<li><strong>Estado</strong>: {{$interview->state}}</li>
			<li><strong>Fecha de creación de entrevista</strong>: {{ date('d-m-Y', strtotime($interview->created_at))}}</li>
		</ul>
  	</div>
    <div class="col-sm-6 col-sm-offset-1">
	  	<h3>Información del aspirante</h3>
		<ul class="list_perks">
			<li><strong>Carrera</strong>: {{$interview->student->carrera}}</li>
			<li><strong>Universidad</strong>: <a href="{{ url('universidad/' . $interview->student->opd->id) }}" class="link_view">{{$interview->student->opd->opd_name}}</a></li>
			<li><a href="{{ url('tablero-empresa/vacante/'. $vacancy->id . '/estudiante/' . $interview->student->id ) }}" class="btn xs">Ver CV</a> </li>
		</ul>
		
 
      
    
      
    </div>
  </div>
@endsection