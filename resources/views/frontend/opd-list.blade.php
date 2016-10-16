@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'home')
@section('js-scripts')
<script src="{{ url('js/home/classie.js') }}"></script>
<script src="{{ url('js/home/modalEffects.js') }}"></script>
@endsection

@section('content')
<div class="container">

  <!-- el buscador -->
  {{Form::open(['url' => 'universidades', 'method' => 'get'])}}
    <p>{{Form::text('query', request('query', ''))}}</p>
  {{Form::close()}}
  <!-- La lista de maromas -->
  @if($opds->count())
  <ul>
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
@endsection