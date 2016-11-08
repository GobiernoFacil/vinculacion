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
			<li class="clearfix titles">
				<span class="col-sm-3 col-xs-4">Cámara</span>
				<span class="col-sm-3 col-xs-3">Correo</span>
				<span class="col-sm-3 col-xs-3">Estado</span>
				<span class="col-sm-3 nomobile">Acciones</span>
			</li>
			@foreach($chambers as $chamber)
			<li class="clearfix">
				<span class="col-sm-3 col-xs-4">
					<a href="{{url("dashboard/camara/{$chamber->id}")}}" class="link_view"> {{$chamber->chamber->chamber_comercial_name}}</a>
				</span>
				<span class="col-sm-3 col-xs-3">
					 {{$chamber->email}}
				</span>
				<span class="col-sm-3 col-xs-3">
					{!! $chamber->enabled > 0 ? '<span class="enabled">Habilitado</span>' : '<span class="disabled">Deshabilitado</span>' !!}
				</span>
				<span class="col-sm-3 col-xs-12">
					<a href="{{url("dashboard/camara/{$chamber->id}")}}" class="link_view">Ver</a>
					<a href="{{url("dashboard/camara/editar/{$chamber->id}")}}" class="btn xs add">Editar</a>
					<a href="{{url("dashboard/camara/{$chamber->id}")}}" class="btn xs">{{ $chamber->enabled > 0 ?  "Deshabilitar" : "Habilitar" }}</a>
					<a  data-chamber="{{$chamber->chamber->chamber_comercial_name}}" href="{{url("dashboard/camara/eliminar/{$chamber->id}")}}" class="btn xs danger">Eliminar</a>
					
				</span>
			</li>
			@endforeach
		</ul>
		
		@else
		  <p>No hay cámaras registradas</p>
		@endif

		{{ $chambers->links() }}
	</div>
</div>

<script>
  var dButtons = document.querySelectorAll(".danger");

  if(dButtons.length){
    for(var i =0; i < dButtons.length; i++){
      dButtons[i].addEventListener("click", function(e){
        var d = confirm("¿Deseas eliminar la cámara: " + this.getAttribute("data-chamber") + "?");
        if(!d){
          e.preventDefault();
        }
      });
    }
  }
</script>
@endsection