@extends('layouts.master-admin')
@section('title', 'Mi perfil')
@section('description', 'Mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'me')

@section('content')
<div class="row">

    @if(Session::has('message'))
      <div class="col-sm-12 message success">
          {{ Session::get('message') }}
      </div>
  @endif
	<div class="col-sm-10 col-sm-offset-1">
		<div class="banner">
			<figure class="cover">
				<img src="{{ url(empty($opd->banner) ? 'img/banners/banner_default_g.jpg' : 'img/banners/' . $opd->banner) }}">
			</figure>
			<div class="row">
				<div class="col-sm-12">
					<a href="{{url('tablero-opd')}}" class="back">&lt; Dashboard</a>
				</div>
				<div class="col-sm-12 repo">
					<div class="header">
						<h1>{{$opd->opd_name}}</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- Perfil -->
		<div class="opd_location">
			<div class="row">
				<div class="col-sm-3 col-xs-6">
					<p><strong>Ubicación</strong>: {{$opd->city}}, {{$opd->state}}</p>
				</div>
				<div class="col-sm-6 col-xs-6">
					<p class="center">{{$opd->address}}  {{$opd->zip ? 'C.P. ' . $opd->zip : '' }}</p>
				</div>
				<div class="col-sm-3 col-xs-6">
					@if(!empty($opd->url))
					<p class="right"><a href="{{$opd->url}}">{{$opd->url}}</a></p>
					@endif
				</div>
			</div>
		</div>
	
	<div class="clearfix"></div>
		<section>
			<div class="row">
			<div class="col-sm-4">
				<p><strong>Logo</strong>:
					<img src="{{ url(empty($opd->logo) ? 'img/logos/default_u.png' : 'img/logos/' . $opd->logo) }}"></p>
				<p><strong>Email</strong>:{{$user->email ? $user->email : "Sin información"}}</p>
				<p><strong>Dirección</strong>: {{$opd->address ? $opd->address : "No se agregó información"}}</p>
  			</div>
  			<div class="col-sm-4">
						<h3>Persona de Contacto</h3>
						<p><br><strong>Nombre</strong>: {{$opd->contact->name ? $opd->contact->name : "Sin información"}}</p>
						<p><strong>Teléfono</strong>: {{$opd->contact->phone}}</p>
						<p><strong>Email</strong>: {{$opd->contact->email ? $opd->contact->email : "Sin información"}}</p>
  			</div>
  			<div class="col-sm-4">
  						<p><a href="{{url('tablero-opd/yo/editar')}}" class="btn">Editar Perfil</a></p>
  						<p><a href="{{url('universidad/'. $opd->id)}}" class="btn add">Ver Perfil Público</a></p>
		
  			</div>
			</div>
		</section>
	</div>
		
</div>
@endsection
