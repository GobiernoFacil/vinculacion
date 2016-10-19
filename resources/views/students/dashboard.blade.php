@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student')


@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				@if(!$user->enabled)
	        @include('students.alert-message')
	      @endif
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
						<p>{{$user->student->matricula}}</p>
            <p>{{$user->student->carrera}}</p>
						<ul class="listinfo">
							@if(!empty($user->email))
							<li><strong>email</strong>: <a href="mailto:{{$user->email}}">{{$user->email}}</a></li>
							@endif
						</ul>

						<p><a class="btn edit" href ="{{url('tablero-estudiante/yo/editar')}}">Edita tu perfil</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--vacantes-->
		<div class="row">

			<div class="col-sm-4">
				<a class="box" href="{{url('')}}">
					<span>Tus Ofertas</span>
					<span class="count">{{$vacancies}}</span>
				</a>
			</div>
			<div class="col-sm-4">
				<a class="box" href="{{url('')}}">
					<span>Tus Entrevistas</span>
					<span class="count">{{$interviews}}</span>
				</a>
			</div>
		</div>
	</div>
</section>
@endsection
