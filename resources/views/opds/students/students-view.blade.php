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
		<h4>CV</h4>
        <ul class="list_perks">
          <li>Sexo : {{$student->cv->gender}}</li>
          <li>Edad : {{$student->cv->age}}</li>
          <li>Ciudad : {{$student->cv->city}}</li>
          <li>Estado : {{$student->cv->state}}</li>
          <li>País : {{$student->cv->country}}</li>
          <li>Teléfono : {{$student->cv->phone}}</li>
          <li>Celular : {{$student->cv->mobile}}</li>
          <li>Correo : {{$student->cv->email}}</li>
          <li>
            <h5>idiomas</h5>
            <ul>
            @foreach($student->cv->languages as $language)
              <li>{{$language->name}} : {{$language->level}}</li>
            @endforeach
            </ul>
          </li>

          <li>
            <h5>software</h5>
            <ul>
            @foreach($student->cv->softwares as $software)
              <li>{{$software->name}} : {{$software->level}}</li>
            @endforeach
            </ul>
          </li>
        </ul>
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
