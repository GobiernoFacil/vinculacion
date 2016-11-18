@extends('layouts.master-admin')
@section('title', 'Oferta Académica')
@section('description', 'Oferta Académica de Universidad')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opd offer view')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>{{$offer->academic_name}}</h1>
	</div>
	<div class="col-sm-6 col-sm-offset-3">
		<ul class="list_perks">
			<li><strong>Universidad</strong>: <a href="{{ url('dashboard/opd/'. $offer->opd_id) }}">{{$offer->opd}}</a></li>
			<li><strong>Ciudad</strong>: {{$offer->city}}</li>
		</ul>
		<p><a href="{{url('dashboard/oferta-academica/editar/' . $offer->id )}}" class="btn">Editar</a></p>
  </div>
</div>
@endsection