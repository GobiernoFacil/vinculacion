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
	<div class="col-sm-12">
	@if($opds->count())
	  <ul class="list">
	  	<li class="row titles">
	  	  	<span class="col-sm-4">Nombre</span>
	  	  	<span class="col-sm-3">Email</span>
	  	  	<span class="col-sm-2">Ubicación</span>
	  	  	<span class="col-sm-3">Contacto</span>
	  	</li>
	  @foreach($opds as $opd)
	    <li class="row">
	    	<span class="col-sm-4"><a href="{{url("dashboard/opd/{$opd->id}")}}"> {{$opd->name}}</a><br>
	    	<span class="note">Actualizado: {{date('d-m-Y', strtotime($opd->updated_at))}}</span></span>
			<span class="col-sm-3">{{$opd->email}}</span>
			<span class="col-sm-2">{{$opd->opd->opd_city}}, {{$opd->opd->opd_state}}</span>
			<span class="col-sm-3">{!!$opd->opd->opd_contact_name ? $opd->opd->opd_contact_name  . '<br>' : '' !!} 
			{!!$opd->opd->opd_contact_email ? $opd->opd->opd_contact_email . '<br>' : ''!!}
			{{ $opd->opd->opd_contact_phone }} </span>
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