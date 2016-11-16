@extends('layouts.master-admin')
@section('title', 'Editar mi perfil')
@section('description', 'Editar mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'chamber me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'me-update')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <!-- Formulario de perfil -->
      <h1>Editar mi perfil</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::model($chamber, ['url' => 'tablero-camara/yo/editar', "class" => "form-horizontal",'files'=> true]) !!}
      <!-- cosas del user -->
      <fieldset>
        <p>
          <label>RFC</label>
          {{Form::text('chamber_rfc', !empty($chamber->chamber_rfc) ? $chamber->chamber_rfc:'',["class" => "form-control"])}}
          @if($errors->has('chamber_rfc'))
          <strong>{{$errors->first('chamber_rfc')}}</strong>
          @endif
        </p>

        <p>
          <label>Nombre Comercial</label>
          {{Form::text('chamber_comercial_name', !empty($chamber->chamber_comercial_name) ? $chamber->chamber_comercial_name : '' ,["class" => "form-control"])}}
          @if($errors->has('chamber_comercial_name'))
          <strong>{{$errors->first('chamber_comercial_name')}}</strong>
          @endif
        </p>

        <p>
          <label>Descripción</label>
          {{Form::textarea('chamber_description','',["class" => "form-control"])}}
          @if($errors->has('chamber_description'))
          <strong>{{$errors->first('chamber_description')}}</strong>
          @endif
        </p>
        <p>
          <label>Dirección</label>
          {{Form::text('chamber_street', !empty($chamber->chamber_street) ? $chamber->chamber_street : '' ,["class" => "form-control"])}}
          @if($errors->has('chamber_street'))
          <strong>{{$errors->first('chamber_street')}}</strong>
          @endif
        </p>
        <p>
          <label>C.P.</label>
          {{Form::text('chamber_zip', !empty($chamber->chamber_zip) ? $chamber->chamber_zip : '' ,["class" => "form-control"])}}
          @if($errors->has('chamber_zip'))
          <strong>{{$errors->first('chamber_zip')}}</strong>
          @endif
        </p>
        <p>
          <label>Municipio</label>
          {{Form::text('chamber_city', !empty($chamber->chamber_city) ? $chamber->chamber_city : '' ,["class" => "form-control"])}}
          @if($errors->has('chamber_city'))
          <strong>{{$errors->first('chamber_city')}}</strong>
          @endif
        </p>
        <p>
          <label>Estado</label>
          {{Form::text('chamber_state', !empty($chamber->chamber_state) ? $chamber->chamber_state : '' ,["class" => "form-control"])}}
          @if($errors->has('chamber_state'))
          <strong>{{$errors->first('chamber_state')}}</strong>
          @endif
        </p>
        <p>
          <label>Web</label>
          {{Form::text('chamber_web', !empty($chamber->chamber_web) ? $chamber->chamber_web : '' ,["class" => "form-control"])}}
          @if($errors->has('chamber_web'))
          <strong>{{$errors->first('chamber_web')}}</strong>
          @endif
        </p>

      </fieldset>

      <!-- cosas del contacto -->
      <fieldset>
        <h5>Datos del contacto</h5>
        <p>
          <label>Nombre</label>
          {{Form::text('cname', !empty($chamber->contact->name) ? $chamber->contact->name : "", ['class' => 'form-control'])}}
          @if($errors->has('cname'))
          <strong>{{$errors->first('cname')}}</strong>
          @endif
        </p>
        <p>
          <label>Teléfono</label>
          {{Form::text('cphone', !empty($chamber->contact->phone) ? $chamber->contact->phone : "", ['class' => 'form-control'])}}
          @if($errors->has('cphone'))
          <strong>{{$errors->first('cphone')}}</strong>
          @endif
        </p>

        <p>
          <label>Correo</label>
          {{Form::text('cemail', !empty($chamber->contact->email) ? $chamber->contact->email : "", ['class' => 'form-control'])}}
          @if($errors->has('cemail'))
          <strong>{{$errors->first('cemail')}}</strong>
          @endif
        </p>
      </fieldset>

      <!-- logo -->
      <fieldset>
        <h5>Logo</h5>
        <p>
        {{Form::file('logo', ['class' => ''])}}
        @if($chamber->chamber_logo)
        </br><strong>Ya cuenta con un logo, puedes seleccionar otro y eliminar el actual.</strong>
        @endif
      </p>
      </fieldset>

      <p>{{Form::submit('Actualizar', ['class' => "btn"])}}</p>

      <!-- se cierra el form -->
      {!! Form::close() !!}
    </div>

  </div>
</div>
@endsection
