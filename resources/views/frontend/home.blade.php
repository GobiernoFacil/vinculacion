@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'home')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Encuentra tu próximo empleo</h1>
		</div>
		<div class="col-sm-8 col-sm-offset-2">
			<p class="lead">Fácil vinculación y acceso a oportunidades laborales a <strong>estudiantes</strong> de las Universidades Politécnicas del Estado de Puebla</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-2">
			<div class="signup">
				<p><strong>1200</strong> vacantes, envía tu CV</p>
				<a>Regístrate</a>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="signup company">
				<p><strong>56</strong> sectores con talento</p>
				<a>Publica vacante</a>
			</div>
		</div>
	</div>
</div>
@endsection