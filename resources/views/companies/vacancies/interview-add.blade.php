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
      <h1 class="separator">Agregar entrevista</h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <p>vacante: {{$vacancy->job}}</p>
      <p>aspirante: {{$student->nombre}}</p>

      {!! Form::open(["url" => "tablero-empresa/vacante/{$vacancy->id}/entrevista/crear/{student->id}"]) !!}
      <p>contacto: {{Form::text("contact", $user->company->contact->name)}}</p>
      <p>correo: {{Form::text("email", $user->company->contact->email)}}</p>
      <p>teléfono:{{Form::text("phone",$user->company->contact->phone)}}</p>
      <p>dirección: {{Form::text("address", $user->company->address)}}</p>
      <!--
      <p>ciudad: {{Form::text("city", $user->company->city)}}</p>
      <p>estado: {{Form::text("state", $user->company->state)}}</p>
      -->
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
