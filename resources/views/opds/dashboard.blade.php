@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd')


@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Tu Tablero</h1>
			</div>
		</div>
		<!--perfil-->
		<div class="row">
			<div class="col-sm-8">
				<div class="box">
					<div class="col-sm-4">
					
					</div>
					<div class="col-sm-8">
						<h3>{{$user->name}}</h3>
						<p>Puebla, Puebla<br>
						<a href="mailto:">hola@bimbi.com</a></p>
						<p><a class="btn edit" href ="{{url('tablero-opd/yo/editar')}}">Edita tu perfil</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--vacantes-->
		<div class="row">
			
			<div class="col-sm-4">
				<div class="box">
					<h4>Tus Estudiantes</h4>
					<h5><span>0</span></h5>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box">
					<h4>Tus Convenios</h4>
					<h5><span>0</span></h5>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
