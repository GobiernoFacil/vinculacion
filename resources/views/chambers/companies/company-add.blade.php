@extends('layouts.master-admin')
@section('title', 'Agregar Empresa')
@section('description', 'Agregar nueva empresa en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'chamber empresas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'empresa add')

@section('content')
<div class="container">
  <!-- Formulario de company -->
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Agregar Empresa</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::model("",['url' => "tablero-camara/empresa/crear", "class" => "form-horizontal"]) !!}

      <!-- cosas de su objeto -->
      <fieldset>
        <h5>Datos de la empresa</h5>
        <p>
          <label>R.F.C.</label>
          {{Form::text('rfc','',["class" => "form-control"])}}
          @if($errors->has('rfc'))
          <strong>{{$errors->first('rfc')}}</strong>
          @endif
        </p>

        <p>
          <label>Razón Social</label>
          {{Form::text('razon_social','',["class" => "form-control"])}}
          @if($errors->has('razon_social'))
          <strong>{{$errors->first('razon_social')}}</strong>
          @endif
        </p>

        <p>
          <label>Nombre Comercial</label>
          {{Form::text('nombre_comercial','',["class" => "form-control"])}}
          @if($errors->has('nombre_comercial'))
          <strong>{{$errors->first('nombre_comercial')}}</strong>
          @endif
        </p>

        <p>
          <label>Dirección</label>
          {{Form::text('address','',["class" => "form-control"])}}
          @if($errors->has('address'))
          <strong>{{$errors->first('address')}}</strong>
          @endif
        </p>

        <p>
          <label>C.P.</label>
          {{Form::text('zip','',["class" => "form-control"])}}
          @if($errors->has('zip'))
          <strong>{{$errors->first('zip')}}</strong>
          @endif
        </p>

        <p>
          <label>Teléfono</label>
          {{Form::text('phone','',["class" => "form-control"])}}
          @if($errors->has('phone'))
          <strong>{{$errors->first('cphone')}}</strong>
          @endif
        </p>
        <p>
          <label>Giro Comercial</label>
          {{Form::text('giro_comercial','',["class" => "form-control"])}}
          @if($errors->has('giro_comercial'))
          <strong>{{$errors->first('giro_comercial')}}</strong>
          @endif
        </p>
        <p>
          <label>Alcance</label>
          {{Form::text('alcance','',["class" => "form-control"])}}
          @if($errors->has('alcance'))
          <strong>{{$errors->first('alcance')}}</strong>
          @endif
        </p>
        <p>
          <label>Tamaño</label>
          {{Form::text('size','',["class" => "form-control"])}}
          @if($errors->has('size'))
          <strong>{{$errors->first('size')}}</strong>
          @endif
        </p>
        <p>
          <label>Tipo</label>
          {{Form::text('type','',["class" => "form-control"])}}
          @if($errors->has('type'))
          <strong>{{$errors->first('type')}}</strong>
          @endif
        </p>
      </fieldset>

      <!-- cosas del contacto -->
      <fieldset>
        <h5>Datos del contacto</h5>
        <p>
          <label>Nombre</label>
          {{Form::text('cname','',["class" => "form-control"])}}
          @if($errors->has('cname'))
          <strong>{{$errors->first('cname')}}</strong>
          @endif
        </p>
        <p>
          <label>Teléfono</label>
          {{Form::text('cphone','',["class" => "form-control"])}}
          @if($errors->has('cphone'))
          <strong>{{$errors->first('cphone')}}</strong>
          @endif
        </p>

        <p>
          <label>Correo</label>
          {{Form::text('cemail','',["class" => "form-control"])}}
          @if($errors->has('cemail'))
          <strong>{{$errors->first('cemail')}}</strong>
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
