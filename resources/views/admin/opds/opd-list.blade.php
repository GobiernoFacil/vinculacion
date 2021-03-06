@extends('layouts.master-admin')
@section('title', 'Lista de Universidades')
@section('description', 'Lista de Universidade del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opds')

@section('content')
<div class="row">
<!-- Universidades -->
	<div class="col-sm-12">
		<h1>Universidades</h1>
	</div>
	<p>
		<div class="col-sm-3 col-sm-offset-9">
			<p><a href="{{url("dashboard/opd/crear")}}" class="btn add"> + Agregar universidad</a></p>
		</div>

	</p>

	<div class="col-sm-12">
		@if(Session::has('message'))
	    <div class="col-sm-12 message success">
	        {{ Session::get('message') }}
	    </div>
	@endif
	@if($opds->count())
	  <ul class="list">
	  	<li class="clearfix titles">
	  	  	<span class="col-sm-3 col-xs-5">Universidad</span>
	  	  	<span class="col-sm-3 nomobile">Ubicación</span>
	  	  	<span class="col-sm-3 col-xs-4">Contacto</span>
	  	  	<span class="col-sm-3 col-xs-2">Acciones</span>
	  	</li>
	  @foreach($opds as $opd)
	    <li class="clearfix">
	    	<span class="col-sm-3 col-xs-5"><a href="{{url("dashboard/opd/{$opd->opd->id}")}}" class="link_view"> {{$opd->opd->opd_name}}</a><br>
	    	<span class="note">Actualizado: {{date('d-m-Y', strtotime($opd->updated_at))}}</span></span>
			<span class="col-sm-3 nomobile">{{$opd->opd->city}}, {{$opd->opd->state}}</span>
			<span class="col-sm-3 col-xs-4">{!!$opd->opd->has('contact') ? $opd->opd->contact->name  . '<br>' : '' !!}
			{!!$opd->opd->has('contact') ? $opd->opd->contact->email . '<br>' : ''!!}
			{{ $opd->opd->has('contact') ? $opd->opd->contact->phone : '' }} </span>
			<span class="col-sm-3 col-xs-2">
				<a href="{{url("dashboard/opd/editar/{$opd->opd->id}")}}" class="btn xs">Editar</a>
				<a href="{{url("dashboard/convenios/{$opd->opd->id}")}}" class="btn  add xs">Convenios</a>
				<a href="{{url("dashboard/opd/eliminar/{$opd->id}")}}" class="btn danger xs" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
			</span>
	    </li>
	  @endforeach
	  </ul>

	@else
		<p>No hay universidades</p>
	@endif


	{{ $opds->links() }}
	</div>
</div>
@endsection
