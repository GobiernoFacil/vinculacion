@extends('layouts.master-admin')
@section('title', 'Agregar Vacante')
@section('description', 'Agregar nueva vacante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'company vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'vacante entrevista add')

@section('content')

<?php
  // define some stuff
  Form::macro('time', function(){
    return '<input type="time">';
  });
?>
<!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      <h1>Agregar entrevista</h1>
    </div>
  </div>
  <div class="row">
  	<div class="col-sm-6">
	  	<h3>Vacante: <a href="{{ url('tablero-empresa/vacante/'. $vacancy->id) }}">{{$vacancy->job}}</a></h3>
  	</div>
  	<div class="col-sm-6">
		<h3>Aspirante: {{ucwords(strtolower($applicant->student->nombre . ' ' . $applicant->student->apellido_paterno))}}</h3>
  	</div>
  </div>
  <div class="separator"></div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
     
      

      {!! Form::open(["url" => "tablero-empresa/vacante/{$vacancy->id}/entrevista/crear/{$student->id}", "class"=>"form"]) !!}
      <p><label>Contacto:</label> {{Form::text("contact", $user->company->contact->name, ["class" => "form-control"])}}</p>
      <p>Correo: {{Form::text("email", $user->company->contact->email, ["class" => "form-control"])}}</p>
      <p>Teléfono:{{Form::text("phone",$user->company->contact->phone, ["class" => "form-control"])}}</p>
      <p>Dirección: {{Form::text("address", $user->company->address, ["class" => "form-control"])}}</p>
      <!--
      <p>ciudad: {{Form::text("city", $user->company->city)}}</p>
      <p>estado: {{Form::text("state", $user->company->state)}}</p>
      <p>día: {{Form::date("date")}}</p>
      <p>hora: {{Form::time("time")}}</p>
      -->

      <p><input type="submit" value="Agendar entrevista" class="btn"></p>

      {!! Form::close() !!}
    </div>
  </div>
@endsection
