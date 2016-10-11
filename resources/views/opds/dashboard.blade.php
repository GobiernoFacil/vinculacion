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
						<div class="figure">
							<i class="material-icons">location_city</i>
						</div>
					</div>
					<div class="col-sm-8">
						<h3>{{$user->name}}</h3>
						<p>{{$user->opd->city}}, {{$user->opd->state}}</p>
						<ul class="listinfo">
							<li><strong>web</strong>: {{$user->opd->url ? $user->opd->url  : 'Sin información'}}</li>
							@if(!empty($user->email))
							<li><strong>email</strong>: <a href="mailto:{{$user->email}}">{{$user->email}}</a></li>
							@endif
						</ul>

						<p><a class="btn edit" href ="{{url('tablero-opd/yo/editar')}}">Edita tu perfil</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--vacantes-->
		<div class="row">
			
			<div class="col-sm-4">
				<a class="box" href="{{url('tablero-opd/estudiantes')}}">
					<span>Tus Estudiantes</span>
					<span class="count">{{$students}}</span>
				</a>
			</div>
			<div class="col-sm-4">
				<a class="box" href="{{url('tablero-opd/convenios')}}">
					<span>Tus Convenios</span>
					<span class="count">{{$contracts}}</span>
				</a>
			</div>
			<div class="col-sm-4">
				<div class="box">
					<h4>Tus Estadísticas</h4>
					<h5><span>0</span></h5>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a class="box" href="{{url('tablero-opd/empresas')}}">
					<span>Empresas</span>
					<span class="count">{{$companies}}</span>
				</a>
			</div>
		</div>
	</div>
</section>
@endsection
