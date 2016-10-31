@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company')


@section('content')
<div class="row">
	<div class="col-sm-12">
		@if(!$user->enabled)
         @include('companies.alert-message')
		@endif
		<h1>Tu Tablero</h1>
	</div>
</div>


<div class="row">
	<div class="col-sm-8">
		<div class="row">
			<!--vacantes-->
			<div class="col-sm-6">
				<a class="box" href="{{url('tablero-empresa/vacantes')}}">
					<span>Tus Vacantes</span>
					<span class="count">{{$company->vacancies->count()}}</span>
				</a>
			</div>
			<!--convenios-->
			<div class="col-sm-6">
				<a class="box" href="{{url('tablero-empresa/convenios')}}">
					<span>Tus Convenios</span>
					<span class="count">{{$company->contracts->count()}}</span>
				</a>
			</div>
			<!--convenios-->
			<div class="col-sm-6">
				<a class="box" href="{{url('tablero-empresa/entrevistas')}}">
					<span>Tus entrevistas</span>
					<span class="count">{{$company->interviews->count()}}</span>
				</a>
			</div>
		</div>
	</div>
	<!--perfil-->
	<div class="col-sm-4">
		<div class="box">
			<h3><i class="material-icons">domain</i>Perfil de tu empresa</h3>
			<div class="separator"></div>
			<div class="col-sm-4">
				<p><img src="{{ url(empty($company->logo) ? 'img/logos/default.png' : 'img/logos/' . $company->logo) }}"></p>
			</div>
			<div class="col-sm-8">
				<h3>{{$company->nombre_comercial}}</h3>				
			</div>
			<div class="col-sm-12">
				<ul class="list_perks">
					<li><p>{{$user->email}}</p></li>
				</ul>
				<p><a class="btn edit" href ="{{url('tablero-empresa/yo/editar')}}">Edita tu perfil</a></p>
			</div>
			<div class="clearfix"></div>
		</div>
		
	</div>
</div>

@endsection