@extends('layouts.master-admin')
@section('title', 'Crear Usuario SECOTRADE')
@section('description', 'Crear Usuario SECOTRADE en la plataforma SEP del Gobierno del Estado de Puebla')
@section('bodyclass', 'secotrade')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'secotrade create')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="separator">Crear usuario SECOTRADE</h1>
		</div>
	</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
{!! Form::open(['url' => 'dashboard/secotrade/crear', "class" => "form-horizontal"]) !!}

<p>
  <label>Nombre</label>
  {{Form::text('name', null, ["class" => "form-control"])}}
  @if($errors->has('name'))
    <strong>{{$errors->first('name')}}</strong>
  @endif
</p>

<p>
  <label>Correo</label>
  {{Form::text('email', null, ["class" => "form-control"])}}
  @if($errors->has('email'))
    <strong>{{$errors->first('email')}}</strong>
  @endif
</p>

<p>
  <label>Contraseña</label>
  {{Form::password('password', ['class' => 'form-control'])}}
  @if($errors->has('password'))
    <strong>{{$errors->first('password')}}</strong>
  @endif
</p>

<p>{{Form::submit('Crear usuario', ['class' => 'btn'])}}</p>

<!-- se cierra el form -->
{!! Form::close() !!}
</div>
</div>

</div>
@endsection
