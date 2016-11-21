@extends('layouts.master-admin')
@section('title', "Ver Estudiante :" . $student->nombre)
@section('description', 'Ver estudiante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'opd estudiantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'estudiante ver')

@section('content')
<!-- Perfil -->
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Estudiante</h3>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		@if(Session::has('message'))
			<div class="col-sm-12 message success">
					{{ Session::get('message') }}
			</div>
	  @endif
		<h2>{{$student->nombre_completo}}</h2>
		
		<ul class="list_perks">
		  	<li><strong>Carrera</strong>: {{$student->carrera}}</li>
		  	<li><strong>Matricula</strong>: {{$student->matricula}}</li>
		  	<li><strong>CURP</strong>: {{$student->curp}}</li>
		  	<li>{!! $student->user->enabled == 1 ? '<span class="enabled">Habilitado</span>' : '<span class="disabled">Deshabilitado</span>' !!}</li>
		  	<li><strong>Creado</strong>: {{date('d-m-Y', strtotime($student->created_at))}}</li>
		  	<li><strong>Actualizado</strong>: {{date('d-m-Y', strtotime($student->updated_at))}}</li>
		</ul>
		@if($student->user->enabled == 1)
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
		
		@endif
	</div>
	
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("tablero-opd/estudiante/editar/{$student->id}")}}" class="btn add">Editar</a></p>
	</div>
	<div class="col-sm-3">
		<p> <a href="{{url("tablero-opd/estudiante/activar/{$student->id}")}}" class="btn">
          {{$student->user->enabled ? "Deshabilitar" : "Habilitar"}}
        </a></p>
	</div>
	<div class="col-sm-3">
		<p><a href="{{url("tablero-opd/estudiante/eliminar/{$student->id}")}}" class="btn danger" onclick = "return confirm('¿Estás seguro?')">Eliminar</a></p>
	</div>
</div>
@endsection
