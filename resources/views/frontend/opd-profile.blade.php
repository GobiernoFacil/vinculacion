@extends('layouts.master')
@section('title', $opd->opd_name)
@section('description', $opd->opd_name . ' en Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds profile')

@section('content')
<div class="banner">
	<figure class="cover">
		<img src="{{ url('img/banners/banner_default_g.jpg') }}">
	</figure>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="{{url('universidades')}}" class="back">&lt; Ver todas las universidades</a>
			</div>
			<div class="col-sm-12 repo">
				<div class="header">
					<h1>{{$opd->opd_name}}</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Perfil -->
<div class="opd_location">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<p>{{$opd->city}}, {{$opd->state}}</p>
			</div>
			<div class="col-sm-6">
				<p class="center">{{$opd->address}}  {{$opd->zip ? 'C.P.' . $opd->zip : '' }}</p>
			</div>
			<div class="col-sm-3">
				@if(!empty($opd->url))
				<p class="right"><a href="{{$opd->url}}">{{$opd->url}}</a></p>
				@endif
			</div>
		</div>
	</div>
</div>
	
<section>
	<!-- convenios y ofertas-->
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<h2>Vacantes para estudiantes de esta universidad</h2>
				<ul class="list">
					<li class="clearfix titles">
						<span class="col-sm-6">Título</span>
						<span class="col-sm-4">Fecha</span>
					</li>
					<li class="clearfix">
						<span class="col-sm-6">EJECUTIVO(A) DE VENTAS</span>
						<span class="col-sm-4">18 de octubre, 2016</span>
						<span class="col-sm-2"><a href="{{url('login')}}" class="btn default xs">Aplicar</a></span>
					</li>
					<li class="clearfix">
						<span class="col-sm-6">Quality Engineer</span>
						<span class="col-sm-4">18 de octubre, 2016</span>
						<span class="col-sm-2"><a href="{{url('login')}}" class="btn default xs">Aplicar</a></span>
					</li>
					<li class="clearfix">
						<span class="col-sm-6">Administrador de Proyectos</span>
						<span class="col-sm-4">17 de octubre, 2016</span>
						<span class="col-sm-2"><a href="{{url('login')}}" class="btn default xs">Aplicar</a></span>
					</li>
				</ul>
								<div class="separator"></div>

				<h2>Convenios con empresas</h2>
				<!--logos-->
				<div class="row">
			<div class="col-sm-3">
				<a href="" class="img_company">
					<img src="{{ url('img/Bimbo_logo.png') }}">
				</a>
			</div>
			<div class="col-sm-3">
				<a href="" class="img_company">
					<img src="{{ url('img/gamesa_logo.png') }}">
				</a>
			</div>
			<div class="col-sm-3">
				<a href="" class="img_company">
					<img src="{{ url('img/SfMlMquK.jpg') }}">
				</a>
			</div>
			<div class="col-sm-3">
				<a href="" class="img_company">
					<img src="{{ url('img/PLSc2CBX_400x400.jpeg') }}">
				</a>
			</div>
		</div>
			</div>
			<div class="col-sm-3">
				<div class="sidebar">
					<img src="{{ url('img/logos/default.png') }}">
					<h3>Contacto</h3>
					<p>{{$opd->contact->name}}</p>
					<p>{{$opd->contact->phone}}</p>
					<p>{{$opd->contact->email}}</p>
				</div>
  			</div>
		</div>
	</div>
</section>
@endsection