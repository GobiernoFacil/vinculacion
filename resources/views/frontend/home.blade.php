@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'home')
@section('js-scripts')
<script src="{{ url('js/home/classie.js') }}"></script>
<script src="{{ url('js/home/modalEffects.js') }}"></script>
@endsection

@section('content')
<?php 
  $is_reg  = !empty(old('type'));
?>
<!--modal login -->
<div class="md-modal md-effect-5 {{$errors->count()  && !$is_reg ? "md-show" : ""}}" id="modal-3">
	<div class="md-content">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-9 right">
				<a class="btn danger md-close" href="#">x</a>
			</div>
		</div>
		<h3><i class="material-icons">person</i> Iniciar Sesión</h3>
		<div class="row">
			<div class="col-sm-12">
			@include('layouts.forms.login_form')
			</div>
			
		</div>
	</div>
</div>

<!--modal registrar estudiantes-->
<div class="md-modal md-effect-5 {{$errors->count()  && $is_reg ? "md-show" : ""}}" id="modal-1">
	<div class="md-content">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-9 right">
				<a class="btn danger md-close" href="#">x</a>
			</div>
		</div>
		<h3><i class="material-icons">person_add</i> Regístrate y encuentra empleo</h3>
		<div class="row">
			<div class="col-sm-12">
			@include('layouts.forms.register_form')
			</div>
			
		</div>
	</div>
</div>
<!--modal registrar empresas-->
<div class="md-modal md-effect-5" id="modal-2">
	<div class="md-content">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-9 right">
				<a class="btn danger md-close" href="#">x</a>
			</div>
		</div>		
		<h3>Registrar Empresa</h3>
		<div class="row">
			<div class="col-sm-12">
			@include('layouts.forms.register_form')
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="welcome">
	<div class="row">
		<div class="col-sm-12">
			<h1>Encuentra tu próximo empleo</h1>
		</div>
		<div class="col-sm-8 col-sm-offset-2">
			<p class="lead">Fácil vinculación y acceso a oportunidades laborales a <strong>estudiantes</strong> de las Universidades Politécnicas del Estado de Puebla</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-xs-6 col-sm-offset-2">
			<div class="signup">
				<p><a href="{{url('oferta-laboral')}}"><strong>{{$vacancies_count}}</strong> vacantes</a>, envía tu CV</p>
				@if (Auth::check())
				@else
				<a class="md-trigger"  data-modal="modal-1">Regístrate</a>
				@endif
			</div>
		</div>
		<div class="col-sm-4 col-xs-6">
			<div class="signup company">
				<p><strong>{{$offer_count}}</strong> sectores con talento</p>
				@if (Auth::check())
				@else
				<a class="md-trigger"  data-modal="modal-2">Publica vacante</a>
				@endif
			</div>
		</div>
	</div>
	</div>
	
	<section>
		<div class="row">
			<div class="col-sm-12">
				<h2>Tu próximo trabajo podría estar con una de estas empresas</h2>
				<p>Si estudias o eres egresado de alguna Universidad Politécnica del Estado de Puebla, agrega tu CV.</p>
			</div>
		</div>
		
			
		
		<!--logos-->
		<div class="row">
			@foreach($companies as $company)
			<div class="col-sm-3 col-xs-6">				
				<a href="{{url('empresa/'.$company->company->id)}}" class="img_company">
					{{ $company->company->nombre_comercial}}
					<img src="
					{{ url(empty($company->company->logo) ? 'img/logos/default.png' : 'img/logos/' . $company->company->logo) }}">
					{{ $company->company->vacancies->count() == 1 ?  $company->company->vacancies->count() . " vacante" :  $company->company->vacancies->count() . " vacantes"}} 
				</a>
			</div>
			@endforeach
		</div>
		<!--btn all-->
		<div class="row">
			<div class="col-sm-3 col-sm-offset-3">
				<a href="{{url('empresas')}}" class="btn">Ver todas las empresas</a>
			</div>
			<div class="col-sm-3">
				<a href="{{url('oferta-laboral')}}" class="btn add">Ver todas las vacantes</a>
			</div>
		</div>
	</section>
</div>
<!--opds-->
<section class="opds">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Encuentra un trabajo cerca de tu universidad</h2>
			</div>
			@if($opds->count())
				<ul class="row">
				@foreach($opds as $opd)
					<li class="col-sm-3">
						<a href="{{url('universidad/' . $opd->opd->id)}}">
						<figure>
							<img src="{{ url('img/banners/banner_default_sm.png') }}">
						</figure>
						<span>{{$opd->name}}</span>
						<span class="location">{{$opd->opd->city}}</span>
						</a>
					</li>
				@endforeach					
				</ul>
			@else
			<p>No hay universidades registradas</p>
			@endif
		</div>
	</div>
</section>
<div class="md-overlay"></div><!-- the overlay element -->

@endsection