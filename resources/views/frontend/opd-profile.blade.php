@extends('layouts.master')
@section('title', $opd->opd_name)
@section('description', $opd->opd_name . ' en Empleo Universitario del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds profile')

@section('content')
<div class="banner">
	<figure class="cover">
		<img src="{{ url(empty($opd->banner) ? 'img/banners/banner_default_g.jpg' : 'img/banners/' . $opd->banner) }}">
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
			<div class="col-sm-3 col-xs-6">
				<p>{{$opd->city}}, {{$opd->state}}</p>
			</div>
			<div class="col-sm-6 col-xs-6">
				<p class="center">{{$opd->address}}  {{$opd->zip ? 'C.P.' . $opd->zip : '' }}</p>
			</div>
			<div class="col-sm-3 col-xs-6">
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
				@if(sizeof($vacancies) >0)
				<ul class ="list">
					<li class="clearfix titles">
						<span class="col-sm-5 col-xs-3">Título</span>
						<span class="col-sm-2 col-xs-2">Fecha</span>
						<span class="col-sm-5 col-xs-5">Carreras</span>
					</li>
					@foreach($vacancies as $vacant)
					<li class="clearfix">
						<span class="col-sm-4 col-xs-4">{{$vacant->job}}</span>
						<span class="col-sm-2 col-xs-2">{{date('d-m-Y', strtotime($vacant->created_at))}}</span>
						<span class="col-sm-4 col-xs-4">{{$vacant->tags}} </span>
						<span class="col-sm-2 col-xs-4 right"><a href="{{url('login')}}" class="btn default xs">Aplicar</a></span>
					</li>
					@endforeach
				</ul>
				@else
				<h3>Por el momento no hay vacantes para el perfil de los estudiantes de esta universidad.</h3>
				@endif
				<!--
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
				-->

				<div class="separator"></div>

				<h2>Convenios con empresas</h2>
				@if($opd->contracts->count())
				<!--convenios-->
				<div class="row">
					@foreach($opd->contracts as $contract)
					<div class="col-sm-3 col-xs-6">
						<a href="{{url('empresa/'.$contract->company_id)}}" class="img_company">
							<img src="{{ url(empty($contract->company->logo) ? 'img/logos/default.png' : 'img/logos/' . $contract->company->logo) }}">
						</a>
					</div>
					@endforeach
				</div>
				@else
				<h3>No cuenta con convenios con empresas.</h3>
				@endif

				<div class="separator"></div>
				<h2>Oferta Académica</h2>
				@if($offers->count())
					<ul class="list">
						<li class="titles clearfix">
							<span class="col-sm-12">Carrera</span>
						</li>
					@foreach($offers as $offer)
						<li class="clearfix">
							<span class="col-sm-12">{{$offer->academic_name}}</span>
						</li>
					@endforeach
					</ul>
				@else
				<h3>No cuenta con oferta académica</h3>
				@endif
			</div>
			<div class="col-sm-3">
				<div class="sidebar">
			   		<img src="{{ url(empty($opd->logo) ? 'img/logos/default_u.png' : 'img/logos/' . $opd->logo) }}">
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
