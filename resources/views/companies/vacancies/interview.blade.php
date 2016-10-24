@extends('layouts.master-admin')
@section('title', 'Agregar Vacante')
@section('description', 'Agregar nueva vacante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'company vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'vacante add')

@section('content')

<div class="container">
  <!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Entrevista</h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <p>vacante: {{$vacancy->job}}</p>
      <p>aspirante: {{$interview->student->nombre}}</p>

      <p>contacto: {{$interview->contact}}</p>
      <p>correo: {{$interview->email}}</p>
      <p>teléfono:{{$interview->phone}}</p>
      <p>dirección: {{$interview->address}}</p>
      
      <!--
      <p>día: {{$interview->date}}</p>
      <p>hora: {{$interview->time}}</p>
      
      <p>ciudad: {{$interview->city}}</p>
      <p>estado: {{$interview->state}}</p>
      -->
    </div>
  </div>
</div>
@endsection
