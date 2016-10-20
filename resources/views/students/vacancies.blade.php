@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student')


@section('content')
<section>
  <div class="container">

    <div class="row">
      <div class="col-sm-12">
        @if(!$user->enabled)
         @include('companies.alert-message') 
        @endif
        <h1>Vacantes</h1>
      </div>
    </div>

    @if($vacancies->count())
    <ul>
      @foreach($vacancies as $vacancy)
      <li>
        <a href="{{url('tablero-estudiante/vacante/' . $vacancy->id)}}">{{$vacancy->job}}</a>
      </li>
      @endforeach
    </ul>
    @else
      <p>No hay ninguna vacante publicada</p>
    @endif
    
  </div>
</section>
@endsection
