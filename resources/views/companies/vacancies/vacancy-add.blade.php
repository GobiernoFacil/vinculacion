@extends('layouts.master-admin')
@section('title', 'Agregar Vacante')
@section('description', 'Agregar nueva vacante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'company vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'vacante add')

@section('content')
<div class="container">
  <!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Agregar vacante</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::open(['url' => "tablero-empresa/vacante/crear", "class" => "form-horizontal"]) !!}

      <!-- cosas de su objeto -->
      <fieldset>
        <h5>Datos de la vacante</h5>
        <!-- 
        job             | varchar(255)     | YES  |     | NULL    |                |
| tags            | text             | YES  |     | NULL    |                |
| age_from        | int(11)          | YES  |     | NULL    |                |
| age_to          | int(11)          | YES  |     | NULL    |                |
| travel          | tinyint(1)       | YES  |     | NULL    |                |
| location        | tinyint(1)       | YES  |     | NULL    |                |
| experience      | text             | YES  |     | NULL    |                |
| salary          | double(8,2)      | YES  |     | NULL    |                |
| work_from       | varchar(255)     | YES  |     | NULL    |                |
| work_to         | varchar(255)     | YES  |     | NULL    |                |
| benefits        | varchar(255)     | YES  |     | NULL    |                |
| expenses        | varchar(255)     | YES  |     | NULL    |                |
| training        | varchar(255)     | YES  |     | NULL    |                |
| state           | varchar(255)     | YES  |     | NULL    |                |
| city            | varchar(255)     | YES  |     | NULL    |                |
| salary_min      | double(8,2)      | YES  |     | NULL    |                |
| salary_max      | double(8,2)      | YES  |     | NULL    |                |
| salary_type     | varchar(255)     | YES  |     | NULL    |                |
| salary_variable | int(11)          | YES  |     | NULL    |                |
| salary_extra    | int(11)          | YES  |     | NULL    |                |
| personality     | varchar(255)     | YES  |     | NULL    |                |
| contract_level  | varchar(255)     | YES  |     | NULL    |                |
| contract_type   | varchar(255)     | YES  |     | NULL    |                |
| speciality      | varchar(255)     | YES  |     | NULL    |                |
        -->
        <p>
          <label>vacante</label>
          {{Form::text('job',null,["class" => "form-control"])}}
          @if($errors->has('job'))
          <strong>{{$errors->first('job')}}</strong>
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
