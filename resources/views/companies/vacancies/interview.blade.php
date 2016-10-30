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
	  	<h3>Vacante: <a href="{{ url('tablero-empresa/vacante/'. $vacancy->id) }}">{{$vacancy->job}}</a></h3>
  	</div>
  	<div class="col-sm-6">
		<h3>Aspirante: {{ucwords(strtolower($interview->student->nombre . ' ' . $interview->student->apellido_paterno))}}</h3>
  	</div>
  </div>
  
  <div class="separator"></div>
  
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
		<ul class="list_perks">
			<li><strong>Carrera</strong>: {{$interview->student->carrera}}</li>
			<li><strong>Universidad</strong>: {{$interview->student->opd->opd_name}}</li>
			<li><strong>CV</strong>: </li>
			<li><strong>Fecha de creación de entrevista</strong>: {{ date('d-m-Y', strtotime($interview->created_at))}}</li>
		</ul>
		<h3>Contacto</h3>
		<ul class="list_perks">
			<li><strong>Contacto</strong>: {{$interview->contact}}</li>
			<li><strong>Correo</strong>: {{$interview->email}}</li>
			<li><strong>Teléfono</strong>:{{$interview->phone}}</li>
			<li><strong>Dirección</strong>: {{$interview->address}}</li>
		</ul>
      <!--
      <p>día: {{$interview->date}}</p>
      <p>hora: {{$interview->time}}</p>
      
      <p>ciudad: {{$interview->city}}</p>
      <p>estado: {{$interview->state}}</p>
      -->
    </div>
  </div>
@endsection