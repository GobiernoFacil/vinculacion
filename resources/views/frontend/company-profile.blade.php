@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'home')

@section('content')
<div class="container">
  <!-- Perfil -->
  <div class="row">
  <div class="col-sm-8 col-sm-offset-2">
    <h3>Empresa</h3>
  </div>

  <div class="col-sm-8 col-sm-offset-2">
    <h2>{{$company->nombre_comercial}}</h2>
    <p><img src="{{ url(empty($company->logo) ? 'default.png' : 'img/logos/' . $company->logo) }}"></p>
    <p>{{$company->rfc}}</p>
    <p>{{$company->razon_social}}</p>
    <p>{{$company->address}}</p>
    <p>{{$company->zip}}</p>

    <p>{{$company->phone}}</p>
    <p>{{$company->email}}</p>
    <p>{{$company->giro_comercial}}</p>
    <p>{{$company->alcance}}</p>
    <p>{{$company->type}}</p>
    <p>{{$company->size}}</p>
  </div>

  <div>
    <h3>contacto</h3>
    <p>{{$company->contact->name}}</p>
    <p>{{$company->contact->phone}}</p>
    <p>{{$company->contact->email}}</p>
  </div>

</div>
@endsection