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

<div class="container">
  <!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Agregar entrevista</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <p>vacante: {{$vacancy->job}}</p>
      <p>aspirante: {{$student->nombre}}</p>

      {!! Form::open(["url" => "tablero-empresa/vacante/{$vacancy->id}/entrevista/crear/{$student->id}"]) !!}
      <p>contacto: {{Form::text("contact", $user->company->contact->name)}}</p>
      <p>correo: {{Form::text("email", $user->company->contact->email)}}</p>
      <p>teléfono:{{Form::text("phone",$user->company->contact->phone)}}</p>
      <p>dirección: {{Form::text("address", $user->company->address)}}</p>
      <!--
      <p>ciudad: {{Form::text("city", $user->company->city)}}</p>
      <p>estado: {{Form::text("state", $user->company->state)}}</p>
      <p>día: {{Form::date("date")}}</p>
      <p>hora: {{Form::time("time")}}</p>
      -->

      <p><input type="submit" value="agendar"></p>

      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
