@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'home')

@section('content')
<div class="container">
  <!-- Perfil -->
  <div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h3>Universidad</h3>
	</div>

	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$opd->opd_name}}</h2>
		<p>{{$opd->city}}</p>
		<p>{{$opd->state}}</p>
		<p>{{$opd->address}}</p>
		<p>{{$opd->zip}}</p>
		<p>{{$opd->url}}</p>
  </div>

  <div>
    <h3>contacto</h3>
    <p>{{$opd->contact->name}}</p>
    <p>{{$opd->contact->phone}}</p>
    <p>{{$opd->contact->email}}</p>
  </div>

</div>
@endsection