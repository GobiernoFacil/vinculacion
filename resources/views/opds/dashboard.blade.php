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
		<div class="row">
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-6">
						<a class="box" href="{{url('tablero-opd/estudiantes')}}">
							<span>Tus Estudiantes</span>
							<span class="count">{{$students}}</span>
						</a>
					</div>
					<div class="col-sm-6">
						<a class="box" href="{{url('tablero-opd/convenios')}}">
							<span>Tus Convenios</span>
							<span class="count">{{$contracts}}</span>
						</a>
					</div>
					<div class="col-sm-6">
						<div class="box">
							<h4>Tus Estadísticas</h4>
							<h5><span>0</span></h5>
						</div>
					</div>
					<div class="col-sm-6">
						<a class="box" href="{{url('tablero-opd/empresas')}}">
							<span>Empresas</span>
							<span class="count">{{$companies}}</span>
						</a>
					</div>
				</div>
			</div>
			
			
			<div class="col-sm-4">
				@if($students_h->count() > 0)
					<?php $s_e = 0;?>
					@foreach($students_h as $s)
						@if ($s->user->enabled == 0 )
						<?php $s_e = $s_e+1;?>
						@endif
					@endforeach
					@if ($s_e > 0)
					<a href="{{ url('tablero-opd/estudiantes/lista-habilitar') }}" class="box cv">
						<span>Estudiantes por habilitar</span>
						<span class="count">{{$s_e}}</span>
					</a>					
					@endif
				@endif
				@if($companies_h > 0)
					
					<a href="{{ url('tablero-opd/empresas/lista-habilitar') }}" class="box cv">
						<span>Empresas por habilitar</span>
						<span class="count">{{$companies_h}}</span>
					</a>					
					
				@endif
				<!--perfil-->
				<div class="box">
					<h3>Tu Perfil</h3>
					<div class="separator"></div>
					<div class="col-sm-4">
						<div class="figure">
							@if($user->opd->logo)
							<img src='{{url("img/logos/{$user->opd->logo}")}}'>
							@else
							<img src="{{ url('img/logos/default_u.png') }}">
							@endif
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
		</div>
	</div>
</section>
@endsection
