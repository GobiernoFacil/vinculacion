@extends('layouts.master-admin')
@section('title', 'Editar mi perfil')
@section('description', 'Editar mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'me-update')

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
      {!! Form::model($user, ['url' => 'tablero-opd/yo/editar', "class" => "form-horizontal",'files'=>true]) !!}

      <p>
        <label>Nombre</label>
        {{Form::text('name', $user->name, ["class" => "form-control"])}}
        @if($errors->has('name'))
        <strong>{{$errors->first('name')}}</strong>
        @endif
      </p>

      <p>
        <label>Correo</label>
        {{Form::text('email', $user->email,["class" => "form-control"])}}
        @if($errors->has('email'))
        <strong>{{$errors->first('email')}}</strong>
        @endif
      </p>

      <p>
        <label>Contraseña</label>
        {{Form::password('password', ['class' => "form-control"])}}
        @if($errors->has('password'))
        <strong>{{$errors->first('password')}}</strong>
        @endif
      </p>
      <p>
        <label>Dirección</label>
        {{Form::text('address', $opd->address, ["class" => "form-control"])}}
        @if($errors->has('address'))
        <strong>{{$errors->first('address')}}</strong>
        @endif
      </p>
      <p>
        <label>C.P.</label>
        {{Form::text('zip', $opd->zip, ["class" => "form-control"])}}
        @if($errors->has('zip'))
        <strong>{{$errors->first('zip')}}</strong>
        @endif
      </p>

      <p>
        <label>Ciudad</label>
        {{Form::text('city', $opd->city, ["class" => "form-control"])}}
        @if($errors->has('city'))
        <strong>{{$errors->first('city')}}</strong>
        @endif
      </p>

      <p>
        <label>Estado</label>
        {{Form::text('state', $opd->state, ["class" => "form-control"])}}
        @if($errors->has('state'))
        <strong>{{$errors->first('state')}}</strong>
        @endif
      </p>

      <p>
        <label>Sitio Web</label>
        {{Form::text('url', $opd->url, ["class" => "form-control"])}}
        @if($errors->has('url'))
        <strong>{{$errors->first('url')}}</strong>
        @endif
      </p>

      <!-- logo -->
      <fieldset>
        <h5>Logo</h5>
        <p>
        {{Form::file('logo', ['class' => ''])}}
       @if($opd->logo)
       </br><strong>Ya cuentas con un logo, puedes seleccionar otro y eliminar el actual.</strong>
       @endif
        </p>
      </fieldset>

      <!-- banner -->
      <fieldset>
        <h5>Banner</h5>
        <p>
        {{Form::file('banner', ['class' => ''])}}
      @if($opd->banner)
    </br><strong>Ya cuentas con un banner, puedes seleccionar otro y eliminar el actual.</strong>
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
