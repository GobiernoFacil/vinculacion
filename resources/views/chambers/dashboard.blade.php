@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'chamber')


@section('content')
		<div class="row">
			<div class="col-sm-12">
				<h1>Tu Tablero</h1>
			</div>
		</div>

		<!--perfil-->
		<div class="row">
			<div class="col-sm-4">
				<a class="box" href="{{url('tablero-camara/empresas')}}">
					<span>Tus Empresas</span>
					<span class="count">{{$c_num}}</span>
				</a>
			</div>
			<div class="col-sm-4">
				<a class="box" href="{{url('tablero-camara/vacantes')}}">
					<span>Tus Vacantes</span>
					<span class="count">{{$v_num}}</span>
				</a>
			</div>
			<div class="col-sm-4">
				<div class="box">
					<h3><i class="material-icons">person</i> Tu Perfil</h3>
					<div class="separator"></div>
					<div class="col-sm-4">
						<img src="{{ url(empty($chamber->chamber_logo) ? 'img/logos/default.png' : 'img/logos/' . $chamber->chamber_logo) }}">
					</div>
					<div class="col-sm-8">
						<h3>{{$chamber->chamber_comercial_name}}</h3>
						<p>{{$user->email}}</p>
						<p><a class="btn edit" href ="{{url('tablero-camara/yo/editar')}}">Edita tu perfil</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>

		<!--vacantes-->
		<div class="row">

		</div>
@endsection
