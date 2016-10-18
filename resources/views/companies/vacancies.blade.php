@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company')


@section('content')
<section>
  <div class="container">

    <div class="row">
      <div class="col-sm-12">
        @if(!$user->enabled)
        <p>Para que tu información forme parte del sitio, y puedas publicar vacantes, un tecnológico debe autorizar tu registro. Si este procedimiento tarda, puedes contactarlos directamente, buscando su información en el directorio de <strong><a target="_blank" href = "{{url('tablero-empresas/universidades')}}">universidades</a></strong>.</p>
        @endif
        <h1>Vacantes</h1>
      </div>
    </div>

    @if($vacancies->count())
    <ul>
      @foreach($vacancies as $vacancy)
      <li>{{$vacancy->job}}</li>
      @endforeach
    </ul>
    @else
      <p>No tienes ninguna vacante publicada</p>
    @endif

    <p><a href="{{url('tablero-empresa/vacante/crear')}}">Crear una vacante</a></p>

  </div>
</section>
@endsection
