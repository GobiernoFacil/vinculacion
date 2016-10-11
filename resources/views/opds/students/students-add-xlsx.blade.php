@extends('layouts.master-admin')
@section('title', 'Actualizar estudiantes vía Excel')
@section('description', 'Lista de Estudiantes del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd estudiantes')
<?php /*
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'estudiantes')
*/ ?>
@section('content')
<div class="row">
  <div class="col-sm-12">
    <h1>Agregar Estudiantes</h1>
  </div>

  {!! Form::open(['url' => 'tablero-opd/estudiantes/actualizar/xlsx', 'files' => true]) !!}
  <p>Agregar varios estudiantes a través de un archivo excel</p>
    {!! csrf_field() !!}
    <p>
    {{Form::file('file')}} <br>
    (El archivo debe ser excel menor a 2mb)
    </p>
    @if($errors->has('file'))
      <strong>{{$errors->first('file')}}</strong>
    @endif

    <p><input type="submit" name="Enviar" class ="btn"></p>
  {!! Form::close() !!}

</div>
@endsection
