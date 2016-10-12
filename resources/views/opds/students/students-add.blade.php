@extends('layouts.master-admin')
@section('title', 'Agregar Estudiante')
@section('description', 'Agregar nuevo estudiante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'opd estudiantes')

@section('content')
<div class="container">
  <!-- Formulario de estudiante -->
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Agregar Estudiante</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::model("",['url' => "tablero-opd/estudiante/crear", "class" => "form-horizontal"]) !!}

      <!-- cosas de su objeto -->
      <fieldset>
      <h5>Datos del estudiante</h5>
        <p>
          <label>Matrícula</label>
          {{Form::text('matricula','',["class" => "form-control"])}}
          @if($errors->has('matricula'))
            <strong>{{$errors->first('matricula')}}</strong>
          @endif
        </p>

        <p>
          <label>Nombre </label>
          {{Form::text('nombre','',["class" => "form-control"])}}
          @if($errors->has('nombre'))
            <strong>{{$errors->first('nombre')}}</strong>
          @endif
        </p>

        <p>
          <label>Apellido Paterno</label>
          {{Form::text('apellido_paterno','',["class" => "form-control"])}}
          @if($errors->has('apellido_paterno'))
            <strong>{{$errors->first('apellido_paterno')}}</strong>
          @endif
        </p>

        <p>
          <label>Apellido Materno</label>
          {{Form::text('apellido_materno','',["class" => "form-control"])}}
          @if($errors->has('apellido_materno'))
            <strong>{{$errors->first('apellido_materno')}}</strong>
          @endif
        </p>

        <p>
          <label>Curp</label>
          {{Form::text('curp','',["class" => "form-control"])}}
          @if($errors->has('curp'))
            <strong>{{$errors->first('curp')}}</strong>
          @endif
        </p>

        <p>
          <label>Carrera</label>
          {{Form::text('carrera','',["class" => "form-control"])}}
          @if($errors->has('carrera'))
            <strong>{{$errors->first('carrera')}}</strong>
          @endif
        </p>

        <p>
          <label>Status</label>
          {{Form::text('status','',["class" => "form-control"])}}
          @if($errors->has('status'))
            <strong>{{$errors->first('status')}}</strong>
          @endif
        </p>


      </fieldset>

      <p>{{Form::submit('Crear',["class" => "btn"])}}</p>

      <!-- se cierra el form -->
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
