@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'home')

@section('content')
<div class="container">

  <!-- el buscador -->
  {{Form::open(['url' => 'empresas', 'method' => 'get'])}}
    <p>{{Form::text('query', request('query', ''))}}</p>
  {{Form::close()}}
  <!-- La lista de maromas -->
  @if($companies->count())
  <ul>
    @foreach($companies as $company)
    <li><a href="{{url('universidad/' . $company->id)}}">{{$company->company_name}}</a></li>
    @endforeach
  </ul>
  @else
  <p>x_____x no hay empresas registradas</p>
  @endif

  <!-- la paginación -->
  {{ $companies->links() }}
</div>
@endsection