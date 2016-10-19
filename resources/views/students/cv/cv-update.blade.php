@extends('layouts.master-admin')
@section('title', 'Actualizar CV')
@section('description', 'Actualizar currículo en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'student cv')

@section('content')
<div class="container">
  <!-- Formulario de company -->
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Actualizar Currículo</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::model($cv,['url' => "tablero-estudiante/cv/editar/", "class" => "form-horizontal"]) !!}

      <!-- cosas de su objeto -->
      <fieldset>
        <h5>Datos del Currículo</h5>
        <p>
          <label>Género</label>
          {{Form::select('gender',['1'=>'Femenino','0'=>'Masculino'],null,["class" => "form-control"])}}
          @if($errors->has('gender'))
          <strong>{{$errors->first('gender')}}</strong>
          @endif
        </p>
        <p>
          <label>Correo </label>
          {{Form::email('email',null,["class" => "form-control"])}}
          @if($errors->has('email'))
          <strong>{{$errors->first('email')}}</strong>
          @endif
        </p>
        <p>
          <label>Edad </label>
          {{Form::number('age',null,["class" => "form-control"])}}
          @if($errors->has('age'))
          <strong>{{$errors->first('age')}}</strong>
          @endif
        </p>
        <div class ="row">
          <div class = "col-sm-6">
            <p>
              <label>Ciudad</label>
              {{Form::text('city',null,["class" => "form-control"])}}
              @if($errors->has('city'))
              <strong>{{$errors->first('city')}}</strong>
              @endif
            </p>
          </div>
          <div class = "col-sm-6">
            <p>
              <label>Estado</label>
              {{Form::text('state',null,["class" => "form-control"])}}
              @if($errors->has('state'))
              <strong>{{$errors->first('state')}}</strong>
              @endif
            </p>
          </div>
        </div>
        <p>
          <label>País</label>
          {{Form::text('country',null,["class" => "form-control"])}}
          @if($errors->has('country'))
          <strong>{{$errors->first('country')}}</strong>
          @endif
        </p>
        <div class ="row">
          <div class = "col-sm-6">
            <p>
              <label>Teléfono</label>
              {{Form::number('phone',null,["class" => "form-control"])}}
              @if($errors->has('phone'))
              <strong>{{$errors->first('phone')}}</strong>
              @endif
            </p>
          </div>
          <div class = "col-sm-6">
            <p>
              <label>Celular </label>
              {{Form::number('mobile',null,["class" => "form-control"])}}
              @if($errors->has('mobile'))
              <strong>{{$errors->first('mobile')}}</strong>
              @endif
            </p>

          </div>
        </div>

      </fieldset>

      <p>{{Form::submit('Actualizar',["class" => "btn"])}}</p>

      <!-- se cierra el form -->
      {!! Form::close() !!}

    </div>
  </div>
</div>

@endsection
