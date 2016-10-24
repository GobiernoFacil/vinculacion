@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'dashboard')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Tablero dirección general del servicio estatal del empleo</h1>
		</div>
		<!--vacantes-->
		<div class="col-sm-4">
			<a class="box" href="{{url('tablero-secotrade/vacantes')}}">
				<span>Tus Vacantes</span>
				<span class="count">{{$vacancies}}</span>
			</a>
		</div>
	</div>
</div>
@endsection