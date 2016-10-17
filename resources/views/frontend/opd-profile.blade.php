@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds profile')

@section('content')
<div class="container">
	<a href="{{url('universidades')}}" class="back">< Ver todas las universidades</a>
</div>
<section>
	<div class="container">
	<!-- Perfil -->
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<h3>Universidad</h3>
			</div>

			<div class="col-sm-10 col-sm-offset-1">
				<h2>{{$opd->opd_name}}</h2>
			</div>
			<div class="col-sm-5 col-sm-offset-1">
				<p>{{$opd->city}}, {{$opd->state}}</p>
				<p></p>
				<p>{{$opd->address}}</p>
				<p>C.P. {{$opd->zip}}</p>
				<p>{{$opd->url}}</p>
			</div>
			<div class="col-sm-5">
  				  <h3>Contacto</h3>
  				  <p>{{$opd->contact->name}}</p>
  				  <p>{{$opd->contact->phone}}</p>
  				  <p>{{$opd->contact->email}}</p>
  			</div>

		</div>
	</div>
</section>
@endsection