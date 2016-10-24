@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company')


@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				@if(!$user->enabled)
         @include('companies.alert-message')
				@endif
				<h1>Tu Tablero</h1>
			</div>
		</div>

		<!--perfil-->
		<div class="row">
			<div class="col-sm-8">
				<div class="box">
					<div class="col-sm-4">
					<img src="{{ url(empty($company->logo) ? 'img/logos/default.png' : 'img/logos/' . $company->logo) }}">
					</div>
					<div class="col-sm-8">
						<h3>{{$company->nombre_comercial}}</h3>
						<p>{{$user->email}}</p>
						<p><a class="btn edit" href ="{{url('tablero-empresa/yo/editar')}}">Edita tu perfil</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<!--vacantes-->
		<div class="row">
			<div class="col-sm-4">
				<a class="box" href="{{url('tablero-empresa/vacantes')}}">
					<span>Tus Vacantes</span>
					<span class="count">{{$company->vacancies->count()}}</span>
				</a>
			</div>
			<div class="col-sm-4">
				<a class="box" href="{{url('tablero-empresa/convenios')}}">
					<span>Tus Convenios</span>
					<span class="count">{{$company->contracts->count()}}</span>
				</a>
			</div>
		</div>
	</div>
@endsection
