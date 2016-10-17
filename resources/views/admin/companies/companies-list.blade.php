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

	<div class="col-sm-3 ">
			<form  role="form" method="GET" action="{{ url('dashboard/empresas') }}" id="search-input">
		<input id = "search-company" type="search" name="searchBox" class="form-control" placeholder="Buscar " value="{{request('searchBox', '')}}">

			<p id ="noResults" style="display:none;">No existen resultados</p>
			</form>

	</div>
	<div class="col-sm-3 col-sm-offset-6">
		<p><a href="{{url("dashboard/empresa/crear")}}" class="btn add"> + Crear empresa</a></p>
	</div>
	<div class="col-sm-12">
		<div id = "companies">
	@if($companies->count())
	  <ul class="list">
	  	<li class="row titles">
	  	  	<span class="col-sm-2">Empresa</span>
	  	  	<span class="col-sm-2">Email</span>
	  	<!--  	<span class="col-sm-2">Estado</span>-->
	  	  	<span class="col-sm-3">Contacto</span>
	  	  	<span class="col-sm-2">Acciones</span>
	  	</li>
	  @foreach($companies as $company)
	    <li class="row">
	    	<span class="col-sm-2"><a href="{{url("dashboard/empresa/{$company->id}")}}"> {{$company->nombre_comercial}}</a><br>
	    	<span class="note">Actualizado: {{date('d-m-Y', strtotime($company->updated_at))}}</span></span>
					@if($company->user)
			<span class="col-sm-2">{{$company->user->email}}</span>
				@else
				<span class="col-sm-2">Sin correo</span>
					@endif
			<span class="col-sm-3">
				{!!$company->has('contact') ? $company->contact->name  . '<br>' : '' !!}
				{!!$company->has('contact') ? $company->contact->email . '<br>' : ''!!}
				{{ $company->has('contact') ? $company->contact->phone : '' }} </span>
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
</div>
<div id = "boxResults" style="display:none;">
	<ul class="list" id = "resultList">
		<li class="row titles">
				<span class="col-sm-2">Empresa</span>
				<span class="col-sm-2">Email</span>
				<span class="col-sm-2">Estado</span>
				<span class="col-sm-3">Contacto</span>
				<span class="col-sm-2">Acciones</span>
		</li>
		<div id ="List">
		</div>

	</ul>
</div>

	{{ $companies->links() }}
	</div>
</div>
@endsection

@section('js-scripts')
<script src="{{url('js/search-app.js')}}"></script>
<script>
var CONFIG = {
	company_url:    "{{url('dashboard/empresa/buscar')}}",
	opd_url:        "{{url('dashboard/buscar-opd')}}",
	student_url:    "{{url('dashboard/buscar-estudiante')}}",
	general_company_url :    "{{url('dahsboard/empresa')}}",
	token      : document.querySelector('input[name="_token"]').value
};

//  appSearch.initialize(CONFIG);
</script>
<!--<script type="text/javascript" src="{{url('/js/requirements/loadCategories.js')}}"></script>-->
@endsection
