@extends('layouts.master')
@section('title', 'Vacantes disponibles en Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'vacancies')

@section('content')
<section>
<div class="container">
	<div class="col-sm-12">
		<h1>Lista de Vacantes</h1>

  <!-- La lista de maromas -->
  @if($vacancies->count())
  <ul class="list">
  	<li class="titles clearfix">
  	  <span class="col-sm-4 col-xs-4">Oferta</span>
  	  <span class="col-sm-3 col-xs-3">Carrera</span>
  	  <span class="col-sm-3 col-xs-3">Ubicación</span>
  	  <span class="col-sm-2 col-xs-2">Publicación</span>
  	</li>
    @foreach($vacancies as $vacancy)
    <li class="clearfix">
    	<span class="col-sm-4 col-xs-4"><a href="{{url('oferta/' . $vacancy->id)}}">{{$vacancy->job}}</a></span>
    	<span class="col-sm-3 col-xs-3">{{$vacancy->tags}}</span>    	
    	<span class="col-sm-3 col-xs-3">{{$vacancy->city}}</span>    	
    	<span class="col-sm-2 col-xs-2">{{date('d-m-Y', strtotime($vacancy->updated_at))}}</span>    	
    </li>
    @endforeach
  </ul>
  @else
  <p>x_____x no hay universidades registradas</p>
  @endif

  <!-- la paginación -->
  {{ $vacancies->links() }}
	</div>
</div>
</section>
@endsection