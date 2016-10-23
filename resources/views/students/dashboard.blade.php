@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student')


@section('content')
<div class="row">
	<div class="col-sm-12">
		@if(!$user->enabled)
			@include('students.alert-message')
		@endif
		<h1>Tu Tablero</h1>
	</div>
</div>
<!--perfil-->
<div class="row">
	<div class="col-sm-8">
		<div class="row">
			<!--vacantes en el sitio-->
			<div class="col-sm-6">
				<a class="box" href="{{url('tablero-estudiante/vacantes')}}">
					<span>Vacantes</span>
					<span class="count">{{$vacancies}}</span>
				</a>
			</div>
			<!--tus entrevistas aplicadas-->
			<div class="col-sm-6">
				<a class="box" href="{{url('tablero-estudiante/vacantes')}}">
					<span>Tus Vacantes Aplicadas</span>
					<span class="count">{{$applications}}</span>
				</a>
			</div>
			<!--tus entrevistas-->
			<div class="col-sm-6">
				<a class="box" href="{{url('tablero-estudiante/entrevistas')}}">
					<span>Tus Entrevistas</span>
					<span class="count">{{$interviews}}</span>
				</a>
			</div>
			<!--cv-->
			<div class="col-sm-6">
				@if($cv->age == NULL)
				<a class="box cv" href="{{url('tablero-estudiante/cv/editar')}}">
					<span><i class="material-icons">folder</i> Tu CV aún no está completo</span>
					<span>Actualizalo</span>
				</a>
				@else
				<a class="box" href="{{url('tablero-estudiante/cv')}}">
					<span><i class="material-icons">folder</i> CV</span>
					<span>Descargar</span>
				</a>
				@endif
			</div>
		</div>
	</div>
	<!--perfil-->
	<div class="col-sm-4">
		<div class="box">
			<h3><i class="material-icons">person</i> Tu Perfil</h3>
			<p><strong>Nombre</strong>: {{$user->name}}</p>
			<ul class="list_perks">
				<li><strong>Carrera</strong>: {{$user->student->carrera}}</li>
				<li>{{$opd->opd_name}}</li>
				<li><strong>Matrícula</strong>: {{$user->student->matricula}}</li>
			</ul>
			<p><a class="btn edit" href ="{{url('tablero-estudiante/yo/editar')}}">Edita tu perfil</a></p>
		</div>		
	</div>
</div>
@endsection