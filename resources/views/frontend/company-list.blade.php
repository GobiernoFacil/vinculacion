@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company')

@section('content')
<section>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Empresas</h1>
  <!-- el buscador -->
  {{Form::open(['url' => 'empresas', 'method' => 'get', 'class' => 'form-search'])}}
    <p>Buscar empresa: {{Form::text('query', request('query', ''),['class' => 'form-control'])}}</p>
  {{Form::close()}}
  <!-- La lista de maromas -->
  @if($companies->count())
  <ul class="list">
	  <li class="titles clearfix">
	  	<span class="col-sm-6">Empresa</span>
	  	<span class="col-sm-3">Ciudad</span>
	  	<span class="col-sm-3">Vacantes</span>
	  </li>
    @foreach($companies as $company) 
    <li class="clearfix">
    	<span class="col-sm-6"><a href="{{url('empresa/' . $company->id)}}">{{$company->nombre_comercial}}</a></span>
    	<span class="col-sm-3">{{$company->zip}}</span>
    	<span class="col-sm-3">0</span>
    </li>
    @endforeach
  </ul>
  @else
  <p>x_____x no hay empresas registradas</p>
  @endif

  <!-- la paginación -->
  {{ $companies->links() }}
		</div>
	</div>
</div>
</section>
@endsection