@extends('layouts.master-admin')
@section('title', 'Ver CV')
@section('description', 'Ver currículo en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'student cv')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'cv')

@section('content')
<!-- Perfil -->
<div class="row">
	@if(Session::has('message'))
		<div class="col-sm-12 message success">
				{{ Session::get('message') }}
		</div>
@endif
	<div class="col-sm-12">
		@if(!$user->enabled)
			@include('students.alert-message')
		@endif
		<h1>Currículum vitae</h1>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$user->name}}</h2>
		<h3>Datos Generales</h3>
		<ul class="list_perks">
			<li><strong>Género</strong>: {{$cv->gender == 0 ? "Masculino" : "Femenino"}}</li>
			<li><strong>Email</strong>: {{$cv->email  ? $cv->email : "Sin información de correo"}}</li>
			<li><strong>Edad</strong>: {{$cv->age ? $cv->age . " años" : "Sin información de edad"}}</li>
			<li><strong>Teléfono</strong>: {{$cv->phone ? $cv->phone : "Sin información "}}</li>
			<li><strong>Celular</strong>: {{$cv->mobile ? $cv->mobile : "Sin información "}}</li>
			<li><strong>Lugar de residencia</strong>: {{$cv->city ? $cv->city . '. ': ""}} {{$cv->state ? $cv->state . '. ' : ""}} {{$cv->country ? $cv->country . '. ' : ""}}</li>
			<li><strong>Creado</strong>: {{date('d-m-Y', strtotime($cv->created_at))}}</li>
			<li><strong>Actualizado</strong>: {{date('d-m-Y', strtotime($cv->updated_at))}}</li>
		</ul>
		<div class="separator"></div>
		<h2>Experiencia laboral</h2>
			<ul>
			@foreach($cv->experiences as $experience)
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
			@foreach($cv->languages as $language)
			<li><strong>{{$language->name}}</strong>: {{$language->level}}</li>
			@endforeach
		</ul>
		<div class="separator"></div>
        
        <h2>Software</h2>
		<ul class="list_perks">
          @foreach($cv->softwares as $software)
          <li><strong>{{$software->name}}</strong> : {{$software->level}}</li>
          @endforeach
        </ul>
		<div class="separator"></div>
	</div>
	<div class="col-sm-4 col-sm-offset-2">
		<p><a href="{{url("tablero-estudiante/cv/editar")}}" class="btn">Editar</a></p>
	</div>
</div>
@endsection
