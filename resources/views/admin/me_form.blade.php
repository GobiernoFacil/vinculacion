@extends('layouts.master-admin')
@section('content')
<div class="container">
<!-- Formulario de perfil -->
<h4>Mi perfil</h4>

<!-- 
     El form se pega a un objeto, y así se llenan automáticamente los inputs
     Form::model($user, ['url' => 'dashboard/yo/editar'])

     La guía de este chisme está aquí: 
     https://laravelcollective.com/docs/5.2/html

     La validación de esta maroma está aquí:
     App\Http\Requests\UpdateAdminRequest
     Esto remueve toda lógica de validación en el controller
-->
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
{!! Form::model($user, ['url' => 'dashboard/yo/editar', "class" => "form-horizontal"]) !!}

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
  {{Form::password('password', ['class' => 'la-clave-secreta'])}}
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
