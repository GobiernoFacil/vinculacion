@extends('layouts.master-admin')
@section('title', 'Vwr Vacante')
@section('description', 'Ver vacante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'puebla vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'vacante view')

@section('content')
<div class="container">
  <!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Ver vacante</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
    <p>vacante: {{$vacancy->job}}</p>

    <p><a href="{{url("tablero-secotrade/vacante/editar/{$vacancy->id}")}}">editar</a></p>
      
      <h4>Estudiantes que aplicaron a la vacante</h4>
      @if($vacancy->applicants()->count())
        <ul>
        @foreach($vacancy->applicants as $applicant)
        <li>
          <a href="{{url("tablero-secotrade/vacante/{$vacancy->id}/estudiante/{$applicant->student->id}")}}"> 
            {{ucwords(strtolower($applicant->student->nombre . ' ' . $applicant->student->apellido_paterno))}} 
          </a>
          [ {{$applicant->student->carrera}} ] <br>
          {{$applicant->student->opd->opd_name}}
        </li>
        @endforeach
        </ul>
      @else
        <p>no aplicaron</p>
      @endif

    </div>
  </div>
</div>
@endsection
