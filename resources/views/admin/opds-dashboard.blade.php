@extends('layouts.master-admin')
@section('title', 'Dashboard Empleo Abierto')
@section('description', 'Dashboard Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'dashboard')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <h1>Panel de control</h1>
  </div>
</div>
<div class="row">

  <!-- Estudiantes -->
  <div class="col-sm-4">
    <div class="box">
      <h4>Estudiantes</h4>
      @if($students > 0 )
      <h5><span>{{$students}}</span></h5>
      @else
      <h4>No hay estudiantes</h4>
      @endif
    </div>
    <p><a href="{{url("tablero-universidad/estudiantes")}}">Estudiantes</a></p>
  </div>
  <!-- Empresas -->
  <div class="col-sm-4">
    <div class="box">
      <h4>Empresas</h4>
      @if($companies > 0 )
      <h5><span>{{$companies}}</span></h5>
      @else
      <h4>No hay empresas</h4>
      @endif
    </div>
    <p><a href="{{url("tablero-universidad/empresas")}}">Empresas</a></p>
  </div>
  <!-- Contracts -->
  <div class="col-sm-4">
    <div class="box">
      <h4>Convenios</h4>
      @if($contracts > 0 )
      <h5><span>{{$contracts }}</span></h5>
      @else
      <h4>No hay convenios registradas</h4>
      @endif
    </div>
    <p><a href="{{url("tablero-universidad/convenios")}}">Cámaras</a></p>
  </div>
</div>

@endsection