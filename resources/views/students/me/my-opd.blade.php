@extends('layouts.master-admin')
@section('title', $opd->opd_name)
@section('description', 'Mi universidad en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'student me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'me opd')

@section('content')
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
	</div>

	<div class="col-sm-12">
		<h1>Mi Universidad</h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="banner">
			<figure class="cover">
				<img src="{{ url(empty($opd->banner) ? 'img/banners/banner_default_g.jpg' : 'img/banners/' . $opd->logo) }}">
			</figure>
			<div class="repo">
				<div class="header">
						<h1>{{$opd->opd_name}}</h1>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Perfil -->
<div class="opd_location">
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
<section>
	<div class="row">
		<div class="col-sm-4">
			<div class="sidebar">
				<img src="{{ url(empty($opd->logo) ? 'img/logos/default_u.png' : 'img/logos/' . $opd->logo) }}">
				<p>{{$opd->user->phone}}</p>
				<p>{{$opd->user->email}}</p>
			</div>
  		</div>
  		<div class="col-sm-4">
				<h3>Persona de Contacto</h3>
				<p><br><strong>Nombre</strong>: {{$opd->contact->name ? $opd->contact->name : "Sin información"}}</p>
						<p><strong>Teléfono</strong>: {{$opd->contact->phone}}</p>
						<p><strong>Email</strong>: {{$opd->contact->email ? $opd->contact->email : "Sin información"}}</p>
  		</div>
	</div>
</section>

@endsection