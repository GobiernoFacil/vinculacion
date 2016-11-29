@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'open-data')

@section('content')
<section>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Datos abiertos</h1>
		</div>
	</div>
</div>

@if($openData->count())
<ul>
  @foreach($openData as $op)
  <li>
    @if($op->resource == "opds")
      <a href="{{url('csv/universidades.xlsx')}}">Universidades</a>
    @else
      <a href="{{url('csv/vacantes.xlsx')}}">Vacantes</a>
    @endif
  </li>
  @endforeach
</ul>
@else
<p>No se han publicado datos abiertos</p>
@endif
</section>
@endsection