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
		  <li><strong>Universidad</strong>: <a href="{{ url('universidad/' . $applicant->student->opd->id) }}" class="link_view">{{$applicant->student->opd->opd_name}}</a></li>
	  </ul>
	  <h2>CV</h2>
	  <h3>Datos Generales</h3>
		<ul class="list_perks">
			<li><strong>Género</strong>: {{$student->cv->gender == 0 ? "Masculino" : "Femenino"}}</li>
			<li><strong>Email</strong>: {{$student->cv->email  ? $student->cv->email : "Sin información de correo"}}</li>
			<li><strong>Edad</strong>: {{$student->cv->age ? $student->cv->age . " años" : "Sin información de edad"}}</li>
			<li><strong>Teléfono</strong>: {{$student->cv->phone ? $student->cv->phone : "Sin información "}}</li>
			<li><strong>Celular</strong>: {{$student->cv->mobile ? $student->cv->mobile : "Sin información "}}</li>
			<li><strong>Lugar de residencia</strong>: {{$student->cv->city ? $student->cv->city . '. ': ""}} {{$student->cv->state ? $student->cv->state . '. ' : ""}} {{$student->cv->country ? $student->cv->country . '. ' : ""}}</li>
			<li><strong>Creado</strong>: {{date('d-m-Y', strtotime($student->cv->created_at))}}</li>
			<li><strong>Actualizado</strong>: {{date('d-m-Y', strtotime($student->cv->updated_at))}}</li>
		</ul>
		
		<div class="separator"></div>
		<h2>Experiencia laboral</h2>
			<ul>
			@foreach($student->cv->experiences as $experience)
			<li>
				<h3>{{$experience->company}}</h3>
				<span class="note">{{$experience->from}} a {{$experience->to}}</span>
				<h4>{{$experience->name}}</h4>
				<ul class="list_perks">
					<li><strong>Sector</strong>: {{$experience->sector}}</li>
					<li><strong>Descripción del puesto</strong>: {{$experience->description}}</li>
					<li><strong>Ubicación</strong>: {{$experience->city ? $experience->city . '. ' : ''}} {{$experience->state}}</li>
				</ul>
			</li>
			@endforeach
			</ul>
		
		<div class="separator"></div>
		<h2>Experiencia académica</h2>
		<ul>
          @foreach($student->cv->academic_trainings as $study)
			<li>
			
				<h3>{{$study->institution}}</h3>
				<span class="note">{{$study->from}} a {{$study->to}}</span>
				<h4>{{$study->name}}</h4>
				<ul class="list_perks">
					<li><strong>Ubicación</strong>: {{$study->city ? $study->city . '. ' : ''}} {{$study->state}}</li>
				</ul>
			</li>
			@endforeach
		</ul>
		
		<div class="separator"></div>
        <h2>Idiomas</h2>
		<ul class="list_perks">
			@foreach($student->cv->languages as $language)
			<li><strong>{{$language->name}}</strong>: {{$language->level}}</li>
			@endforeach
		</ul>
		<div class="separator"></div>
        
        <h2>Software</h2>
		<ul class="list_perks">
          @foreach($student->cv->softwares as $software)
          <li><strong>{{$software->name}}</strong> : {{$software->level}}</li>
          @endforeach
        </ul>
		<div class="separator"></div>
		<p><a href="{{url("tablero-empresa/vacante/{$vacancy->id}/entrevista/crear/{$student->id}")}}" class="btn">Agendar una entrevista</a></p>
    </div>
  </div>
@endsection