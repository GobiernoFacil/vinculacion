@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company')


@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				@if(!$user->enabled)
				<p>Para que tu información forme parte del sitio, y puedas publicar vacantes, un tecnológico debe autorizar tu registro. Si este procedimiento tarda, puedes contactarlos directamente, buscando su información en el directorio de <strong><a target="_blank" href = "{{url('tablero-empresas/universidades')}}">universidades</a></strong>.</p>
				@endif
				<h1>Tablero de compradores</h1>
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
				<div class="box">
					<h4>Tus Vacantes</h4>
					<h5><span>{{$company->vacancies->count()}}</span></h5>
				</div>
			</div>

			<!-- convenios -->
			<div class="col-sm-4">
				<div class="box">
					<h4>Tus Convenios</h4>
					<h5><span>{{$company->contracts->count()}}</span></h5>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
