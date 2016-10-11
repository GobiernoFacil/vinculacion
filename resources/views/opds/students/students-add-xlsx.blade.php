@extends('layouts.master-admin')
@section('title', 'Actualizar estudiantes vía Excel')
@section('description', 'Lista de Estudiantes del Gobierno del Estado de Puebla')
@section('bodyclass', 'estudiantes')
<?php /* 
@section('breadcrumb', 'layouts.breadcrumb') 
@section('breadcrumb_a', 'estudiantes')
*/ ?>
@section('content')
<div class="row">
  <div class="col-sm-12">
    <h1>Estudiantes</h1>
  </div>

  {!! Form::open(['url' => 'tablero-opd/estudiantes/actualizar/xlsx', 'files' => true]) !!}
    {!! csrf_field() !!}
    <p>
    {{Form::file('file')}} <br>
    (el archivo debe ser excel menor a 2mb)
    </p>
    @if($errors->has('file'))
      <strong>{{$errors->first('file')}}</strong>
    @endif

    <p><input type="submit" name="Enviar"></p>
  {!! Form::close() !!}

</div>
@endsection