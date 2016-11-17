@extends('layouts.master-admin')
@section('title', 'Universidad: ' . $opd->opd_name)
@section('description', 'Universidad')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opd-view')

@section('content')
<!-- Perfil -->
<div class="row">
	@if(Session::has('message'))
	<div class="col-sm-12 message success">
	    {{ Session::get('message') }}
	</div>
	@endif
	<div class="col-sm-12">
		<div class="banner">
			<figure class="cover">
				<img src="{{ url(empty($opd->banner) ? 'img/banners/banner_default_g.jpg' : 'img/banners/' . $opd->banner) }}">
			</figure>
			<div class="row">
				<div class="col-sm-12">
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
					<img src="{{ url(empty($opd->logo) ? 'img/logos/default_u.png' : 'img/logos/' . $opd->logo) }}">					
  				</div>
  				<div class="col-sm-4">
	  				<h3>Información de Universidad</h3>
					<ul class="list">
						<li><strong>Email</strong>: {{!empty($opd->user->email) ? $opd->user->email : "Sin información" }}</li>
						<li><strong>Dirección</strong>: {{$opd->address ? $opd->address : "No se agregó información"}}</li>
						@if($opd->user)
						<li>{!! $opd->user->enabled == 0 ? '<span class="disabled">Deshabilitado</span>' : '<span class="enabled">Habilitado</span>' !!}</li>
						@endif
						<li>Creado: {{date('d-m-Y', strtotime($opd->created_at))}}</li>
						<li>Actualizado: {{date('d-m-Y', strtotime($opd->updated_at))}}</li>
					</ul>
  				</div>
  				<div class="col-sm-4">
					<h3>Persona de Contacto</h3>
					<ul class="list">
						<li><strong>Nombre</strong>: {{$opd->contact->name ? $opd->contact->name : "Sin información"}}</li>
						<li><strong>Teléfono</strong>: {{$opd->contact->phone}}</li>
						<li><strong>Email</strong>: {{$opd->contact->email ? $opd->contact->email : "Sin información"}}</li>
					</ul>
  				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
  					<p><a href="{{url("dashboard/opd/editar/{$opd->id}")}}" class="btn">Editar Universidad</a></p>
  				</div>
  				<div class="col-sm-4">
  					<p><a href="{{url('dashboard/convenios/'. $opd->id)}}" class="btn add">Ver Convenios de la Universidad</a></p>
  					<p><a href="{{url('universidad/'. $opd->id)}}" class="btn">Ver Perfil Público</a></p>
  				</div>
  				<div class="col-sm-4">
  					<p><a href="{{url("dashboard/opd/eliminar/{$opd->id}")}}" class="btn danger" onclick ="return confirm('¿Estás seguro?')">Eliminar</a></p>
  				</div>
			</div>
		</section>
	</div>
</div>
@endsection
