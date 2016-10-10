@extends('layouts.master-admin')
@section('title', 'Lista de Empresas')
@section('description', 'Lista de Empresas del Gobierno del Estado de Puebla')
@section('bodyclass', 'empresas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'empresas')

@section('content')
<div class="row">
<!-- Empresas -->
	<div class="col-sm-12">
		<h1>Empresas</h1>
	</div>
	<div class="col-sm-12">
	@if($companies->count())
	  <ul class="list">
	  	<li class="row titles">
	  	  	<span class="col-sm-2">Empresa</span>
	  	  	<span class="col-sm-2">Email</span>
	  	  	<span class="col-sm-2">Estado</span>
	  	  	<span class="col-sm-3">Contacto</span>
	  	  	<span class="col-sm-2">Acciones</span>
	  	</li>
	  @foreach($companies as $company)
	    <li class="row">
	    	<span class="col-sm-2"><a href="{{url("dashboard/empresa/{$company->id}")}}"> {{$company->name}}</a><br>
	    	<span class="note">Actualizado: {{date('d-m-Y', strtotime($company->updated_at))}}</span></span>
			<span class="col-sm-2">{{$company->email}}</span>
			<span class="col-sm-2">{{$company->enabled == 0 ? 'Habilitado' : 'Deshabilitado'}}</span>
			<span class="col-sm-3">
				{!!$company->company->has('contact') ? $company->company->contact->name  . '<br>' : '' !!}
				{!!$company->company->has('contact') ? $company->company->contact->email . '<br>' : ''!!}
				{{ $company->company->has('contact') ? $company->company->contact->phone : '' }} </span>
			</span>
			<span class="col-sm-2">
				<a href="{{url("dashboard/empresa/editar/{$company->id}")}}" class="btn xs">Editar</a>
						<a href="{{url("dashboard/empresa/eliminar/{$company->id}")}}" class="btn danger xs">Eliminar</a>
			</span>
	    </li>
	  @endforeach
	  </ul>

	@else
		<p>No hay empresas</p>
	@endif


	{{ $companies->links() }}
	</div>
</div>
@endsection
