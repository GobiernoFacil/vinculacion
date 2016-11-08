@extends('layouts.master-admin')
@section('title', 'Lista de Cámaras')
@section('description', 'Lista de Cámaras en la plataforma del Gobierno del Estado de Puebla')
@section('bodyclass', 'hambers')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'chambers')

@section('content')
<div class="row">
	<!-- chambers -->
	<div class="col-sm-12">
		@if(Session::has('message'))
		<div class="message success">
          {{ Session::get('message') }}
      	</div>
	  	@endif
	  	<h1>Cámaras</h1>
	</div>
	<div class="col-sm-2 col-sm-offset-10">
    	<p><a href="{{url('dashboard/camara/crear')}}" class="btn add"> + Crear cámara</a></p>
  	</div>
	<div class="col-sm-12">
		@if($chambers->count())
		<ul class="list">
			@foreach($chambers as $chamber)
			<li><a href="{{url("dashboard/camara/{$chamber->id}")}}"> {{$chamber->chamber->chamber_comercial_name}}</a></li>
			@endforeach
		</ul>
		
		@else
		  <p>No hay cámaras registradas</p>
		@endif

		{{ $chambers->links() }}
	</div>
</div>
@endsection