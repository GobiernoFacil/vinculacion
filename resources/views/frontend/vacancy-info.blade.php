@extends('layouts.master')
@section('title', $vacancy->job)
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'vacancies')

@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
		    	<!--title-->
    			<h1>{{$vacancy->job}}</h1>
		    	<!--info-->
    			<div class="row">
		    		<div class="col-sm-6">
						<p>Creado: {{date('d-m-Y', strtotime($vacancy->created_at))}} - Actualizado: {{date('d-m-Y', strtotime($vacancy->updated_at))}}</p>
		    		</div>
					<!--location-->
		    		<div class="col-sm-6">
		    			<p class="right">Ubicación: {{$vacancy->city . ', ' . $vacancy->state}}</p>
		    		</div>
    			</div>
				<div class="separator"></div>
				<!-- more info-->
				<div class="row">
					<div class="col-sm-6">
						<h3><strong>Carrera</strong>: {{$vacancy->tags}}</h3>
					</div>
					<div class="col-sm-6">
						<h3><strong>Especialidad</strong>: {{$vacancy->speciality}}</h3>
					</div>
				</div>
				<div class="separator"></div>
				<!-- Requisitos / beneficios-->
				<div class="row">
					<div class="col-sm-6">
					  <h3 class="separator">Requisitos</h3>
					  <ul class="list_perks">
						  <li><strong>Experiencia</strong>: {{$vacancy->experience}}</li>
					  </ul>
					</div>
					<div class="col-sm-6">
						<h3 class="separator">Ofrecemos</h3>
						<ul class="list_perks">
						  <li><strong>Beneficios</strong>: {{$vacancy->benefits		  }}</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="box">
						<h3>Para información más detallada de la vacante accede a tu cuenta en la plataforma.</h3>
					</div>
				</div>
    		</div>
    		<div class="col-sm-3">
	    		<div class="box">
					<p>Para aplicar a la vacante, debes pertenecer a la plataforma: </p>
					<p><a href="{{url('login')}}" class="btn">Iniciar Sesión</a></p>
					<p><a href="{{url('register')}}" class="btn add">Regístrate</a></p>
	    		</div>
    		</div>
		</div>
	</div>
</section>
@endsection