@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds')

@section('content')
<section>
<div class="container">
	<div class="col-sm-12">
		<h1>Lista de Universidades</h1>
  <!-- el buscador -->
  {{Form::open(['url' => 'universidades', 'method' => 'get'])}}
    <p>{{Form::text('query', request('query', ''))}}</p>
  {{Form::close()}}
  <!-- La lista de maromas -->
  @if($opds->count())
  <ul class="list">
	  <li class="titles row">
	  	<span class="col-sm-8">Universidad</span>
	  	<span class="col-sm-4">Ubicación</span>
	  </li>
    @foreach($opds as $opd)
    <li><a href="{{url('universidad/' . $opd->id)}}">{{$opd->opd_name}}</a></li>
    @endforeach
  </ul>
  @else
  <p>x_____x no hay universidades registradas</p>
  @endif

  <!-- la paginación -->
  {{ $opds->links() }}
	</div>
</div>
</section>
@endsection