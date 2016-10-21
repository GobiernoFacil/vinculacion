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
      @if(!$user->enabled)
          @include('companies.alert-message')
      @endif
      <h1 class="separator">Ver aspirante</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <p>vacante: {{$vacancy->job}}</p>

      <h4>aspirante</h4>
      <p>{{$student->nombre}}</p>

      <p><a href="{{url("tablero-empresa/vacante/{$vacancy->id}/entrevista/crear/{$student->id}")}}">Agendar una entrevista</a></p>
    </div>
  </div>
</div>
@endsection
