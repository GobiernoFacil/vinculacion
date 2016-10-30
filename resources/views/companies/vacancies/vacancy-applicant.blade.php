@extends('layouts.master-admin')
@section('title', 'Agregar Vacante')
@section('description', 'Agregar nueva vacante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'company vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'vacante aspirante')

@section('content')
  <!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      @if(!$user->enabled)
          @include('companies.alert-message')
      @endif
      <h1>Ver aspirante</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
      <h2>{{ucwords(strtolower($applicant->student->nombre . ' ' . $applicant->student->apellido_paterno))}}</h2>
	  <h4>Vacante</h4>
	  <p><a href="{{ url('tablero-empresa/vacante/'.$vacancy->id)}}">{{$vacancy->job}}</a></p>
      <h4>Información del aspirante</h4>
	  <ul class="list_perks">
		  <li><strong>Carrera</strong>: {{$applicant->student->carrera}}</li>
		  <li><strong>Universidad</strong>: {{$applicant->student->opd->opd_name}}</li>
		  <li><strong>CV</strong>: </li>
	  </ul>
	  
      <p><a href="{{url("tablero-empresa/vacante/{$vacancy->id}/entrevista/crear/{$student->id}")}}" class="btn">Agendar una entrevista</a></p>
    </div>
  </div>
@endsection