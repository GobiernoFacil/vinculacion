@extends('layouts.master')
@section('title', $company->nombre_comercial)
@section('description', $company->nombre_comercial . ' en el sitio de Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<a href="{{url('empresas')}}" class="back">&lt; Ver todas las empresas</a>
		</div>
	</div>
</div>

<section>
	<div class="container">
	<!-- Perfil -->
		<div class="row">
			<div class="col-sm-1 col-xs-3">
			    <img src="{{ url(empty($company->logo) ? 'img/logos/default.png' : 'img/logos/' . $company->logo) }}">
			</div>
			<div class="col-sm-6 col-xs-9">
			  <h1>{{$company->nombre_comercial}}</h1>
			</div>
			<div class="col-sm-2  col-xs-6">
			  <h3>Vacantes</h3>
			  <h2>0</h2>
			</div>
			<div class="col-sm-3  col-xs-6 right">
			  <h3>Tamaño</h3>
			  <h2>{{$company->size}}</h2>
			</div>
  		</div>
  		
  		<!-- opd_location -->

  		<div class="row">
  			<div class="opd_location">
				<div class="col-sm-3  col-xs-6">
					<p>{{$company->address}}, {{$company->zip}}</p>
				</div>
				<div class="col-sm-6  col-xs-6">
					<p class="center"><strong>Giro comercial</strong>: {{$company->giro_comercial}}</p>
				</div>
				<div class="col-sm-3  col-xs-6">
					<p class="right"><strong>Alcance</strong>: {{$company->alcance}}</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
  		</div>
  		<div class="separator"></div>
	</div>
	
	<!-- convenios y ofertas-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Vacantes de {{$company->nombre_comercial}} </h2>
				<ul class="list">
					<li class="clearfix titles">
						<span class="col-sm-6 col-xs-6">Título</span>
						<span class="col-sm-4 col-xs-6">Fecha</span>
					</li>
					<li class="clearfix">
						<span class="col-sm-6 col-xs-6">EJECUTIVO(A) DE VENTAS</span>
						<span class="col-sm-4 col-xs-6">18 de octubre, 2016</span>
						<span class="col-sm-2 col-xs-12 right"><a href="{{url('login')}}" class="btn default xs">Aplicar</a></span>
					</li>
					<li class="clearfix">
						<span class="col-sm-6 col-xs-6">Quality Engineer</span>
						<span class="col-sm-4 col-xs-6">18 de octubre, 2016</span>
						<span class="col-sm-2 col-xs-12 right"><a href="{{url('login')}}" class="btn default xs">Aplicar</a></span>
					</li>
					<li class="clearfix">
						<span class="col-sm-6 col-xs-6">Administrador de Proyectos</span>
						<span class="col-sm-4 col-xs-6">17 de octubre, 2016</span>
						<span class="col-sm-2 col-xs-12 right"><a href="{{url('login')}}" class="btn default xs">Aplicar</a></span>
					</li>
				</ul>
				<div class="separator"></div>

				<h2>Convenios con universidades</h2>
				<!--logos-->
				<div class="row">
					<div class="col-sm-3 col-xs-6 ">
						<a href="" class="img_company">
							<img src="{{ url('img/logos/default.png') }}">
							Universidad
						</a>
					</div>
					<div class="col-sm-3 col-xs-6">
						<a href="" class="img_company">
							<img src="{{ url('img/logos/default.png') }}">
							Universidad
						</a>
					</div>
					<div class="col-sm-3 col-xs-6">
						<a href="" class="img_company">
							<img src="{{ url('img/logos/default.png') }}">
							Universidad
						</a>
					</div>
					<div class="col-sm-3 col-xs-6">
						<a href="" class="img_company">
							<img src="{{ url('img/logos/default.png') }}">
							Universidad
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection