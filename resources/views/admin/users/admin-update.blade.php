@extends('layouts.master-admin')
@section('content')
<div class="container">
<!-- Formulario de perfil -->
<h4>Editar Administrador</h4>

<div class="row">
<div class="col-sm-6 col-sm-offset-3">
{!! Form::model($admin, ['url' => "dashboard/administrador/editar/{$admin->id}", "class" => "form-horizontal"]) !!}

<p>
  <label>nombre</label>
  {{Form::text('name', null, ["class" => "form-control"])}}
  @if($errors->has('name'))
    <strong>{{$errors->first('name')}}</strong>
  @endif
</p>

<p>
  <label>correo</label>
  {{Form::text('email')}}
  @if($errors->has('email'))
    <strong>{{$errors->first('email')}}</strong>
  @endif
</p>

<p>
  <label>password</label>
  {{Form::password('password', ['class' => 'form-control'])}}
  @if($errors->has('password'))
    <strong>{{$errors->first('password')}}</strong>
  @endif
</p>

<p>{{Form::submit('Actualizar')}}</p>

<!-- se cierra el form -->
{!! Form::close() !!}
</div>
</div>

</div>
@endsection
