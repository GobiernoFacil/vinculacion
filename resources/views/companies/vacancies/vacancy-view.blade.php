@extends('layouts.master-admin')
@section('title', $vacancy->job)
@section('description', 'Ver vacante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'company vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'vacante ver')

@section('content')
  <!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      @if(!$user->enabled)
          @include('companies.alert-message')
      @endif
      @if(Session::has('message'))
        <div class="col-sm-12 message success">
            {{ Session::get('message') }}
        </div>
    @endif
    </div>
    <div class="col-sm-8">
    	<h1>{{$vacancy->job}}</h1>
    	<div class="row">
	    	<div class="col-sm-6">
				<p>Creado: {{date('d-m-Y', strtotime($vacancy->created_at))}} - Actualizado: {{date('d-m-Y', strtotime($vacancy->updated_at))}}</p>
	    	</div>
	    	<div class="col-sm-6">
	    		<p class="right">Ubicación: {{$vacancy->city . ', ' . $vacancy->state}}</p>
	    	</div>
    	</div>
    </div>
    <div class="col-sm-4">
	    <div class="row opd_location">
		  	 <div class="col-sm-6">
			    <h3>Aplicaron</h3>
			    <h2>{{$vacancy->applicants()->count()}}
    			</h2>
    		</div>
    		 <div class="col-sm-6">
			     <h3>Entrevistas</h3>
    			<h2>0</h2>
    		</div>
	    </div>
    </div>
  </div>
    <div class="separator"></div>
  <div class="row">
  	<div class="col-sm-4">
		<h3>Carrera: {{$vacancy->tags}}</h3>
		<p>Especialidad: {{$vacancy->speciality}}</p>
  	</div>
  	<div class="col-sm-4">
		<h3>Sueldo: ${{number_format($vacancy->salary,2, '.', ',')}}</h3>
		<p>Tipo de salario: {{$vacancy->salary_type}}</p>
  	</div>
  	<div class="col-sm-4">
		<h3>Experiencia: {{$vacancy->experience}}</h3>
  	</div>
  </div>

  <div class="row">
  	<div class="col-sm-6">
	  <h3 class="separator">Requisitos</h3>
	  <p>Descripción:</p>
	  <ul class="list_perks">
		  <li><strong>Edad</strong>: {{$vacancy->age_from . ' - ' . $vacancy->age_to}}</li>
		  <li><strong>Personalidad</strong>: {{$vacancy->personality	  }}</li>
		  <li><strong>Horario</strong>: {{$vacancy->work_from}} - {{$vacancy->work_to }}</li>
		  <li>{{$vacancy->travel == 1 ? 'Disponibilidad para viajar requerida.' : 'Disponibilidad para viajar no requerida.'}}</li>
		  <li>{{$vacancy->location == 1 ? 'Posibilidad de cambio de domicilio requerida.' : 'Posibilidad de cambio de domicilio no requerida.'}}</li>
	  </ul>
  	</div>
  	<div class="col-sm-6">
	  <h3 class="separator">Ofrecemos</h3>
	  <ul class="list_perks">
	  	<li><strong>Beneficios</strong>: {{$vacancy->benefits		  }}</li>
	  	<li><strong>Gastos Pagados</strong>: {{ $vacancy->expenses }}</li>
	  	<li><strong>Capacitación</strong>: {{$vacancy->training		  }}</li>
	  	<li><strong>Sueldo mínimo</strong>: ${{ number_format($vacancy->salary_min,2, '.', ',') }}</li>
	  	<li><strong>Sueldo máximo</strong>: ${{ number_format($vacancy->salary_max,2, '.', ',') }}</li>
	  	{!! $vacancy->salary_extra ? '<li>' . $vacancy->salary_extra . '</li>' : '' !!}
	  	{!! $vacancy->salary_variable ? '<li>' . $vacancy->salary_variable . '</li>' : '' !!}
	  	{!! $vacancy->contract_level ? '<li>' . $vacancy->contract_level . '</li>' : '' !!}
	  	{!! $vacancy->contract_type ? '<li>' . $vacancy->contract_type . '</li>' : '' !!}
	  	<li><strong>Más información</strong>: {{$vacancy->url  		  }}</li>
	  </ul>
  	</div>
  </div>
  <div class="row">
  	<div class="col-sm-6 col-sm-offset-3">
    	<p><a href="{{url("tablero-empresa/vacante/editar/{$vacancy->id}")}}" class="btn">Editar Vacante</a></p>
  	</div>
  </div>
  <div class="separator"></div>
  <div class="row">
  	<div class="col-sm-12">
    @if($user->enabled)
      <h2>Estudiantes que aplicaron a la vacante</h2>
      @if($vacancy->applicants()->count())
        <ul>
        @foreach($vacancy->applicants as $applicant)
        <li>
          <a href="{{url("tablero-empresa/vacante/{$vacancy->id}/estudiante/{$applicant->student->id}")}}">
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
    @endif

    </div>
  </div>
@endsection
