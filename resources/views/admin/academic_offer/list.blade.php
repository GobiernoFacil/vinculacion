@extends('layouts.master-admin')
@section('title', 'Oferta Académica')
@section('description', 'Oferta Académica de Universidad')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opd offer')

@section('content')
<div class="row">
	<div class="col-sm-12">
		@if(Session::has('message'))
		<div class="message success">
          {{ Session::get('message') }}
      	</div>
	  	@endif
		
		<h1>Oferta académica: {{$offers_total}} carreras</h1>
	</div>
	<div class="col-sm-4 col-sm-offset-4">
    	<p><a href="{{url('dashboard/oferta-academica/actualizar/xlsx')}}" class="btn"> + Actualizar Oferta académica vía xls</a></p>
  	</div>
	<div class="col-sm-4">
    	<p><a href="{{url('dashboard/oferta-academica/crear')}}" class="btn add"> + Crear Oferta académica</a></p>
  	</div>
	<div class="col-sm-12">
		@if($offers)
		<ul class="list">
			<li class="titles clearfix">
				<span class="col-sm-4">Carrera</span>
				<span class="col-sm-4">Universidad</span>
				<span class="col-sm-2">Ciudad</span>
				<span class="col-sm-2">Acciones</span>
			</li>
			@foreach($offers as $offer)
			<li class="clearfix">
				<span class="col-sm-4">{{$offer->academic_name}}</span>
				<span class="col-sm-4"><a href="{{ url('dashboard/opd/'. $offer->opd_id) }}" class="link_view">{{$offer->opd}}</a></span>
				<span class="col-sm-2">{{$offer->city}}</span>
				<span class="col-sm-2"><a href="{{url("dashboard/oferta-academica/editar/{$offer->id}")}}" class="btn xs">Editar</a></span>
			</li>
	  		@endforeach
		</ul>
		@else
		<p>No has registrado ninguna oferta académica</p>
		@endif
		{{ $offers->links() }}
	</div>
</div>
@endsection