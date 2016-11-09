@extends('layouts.master-admin')
@section('title', 'Lista de Vacantes')
@section('description', 'Lista de Vacantes en la plataforma del Gobierno del Estado de Puebla')
@section('bodyclass', 'vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'vacantes')

@section('content')
<div class="row">
<!-- Vacantes -->
	<div class="col-sm-12">
		<h1>Vacantes</h1>
	</div>
	<div class="col-sm-12">
	@if($vacancies->count())
	  <ul class="list">
	  	<li class="clearfix titles">
	  	</li>
	  @foreach($vacancies as $vacancy)
	    <li class="clearfix">
	    	{{$vacancy}}
	    </li>
	  @endforeach
	  </ul>
	
	@else
		<p>No hay vacantes</p>
	@endif
	
	
	{{ $vacancies->links() }}
	</div>
</div>
@endsection