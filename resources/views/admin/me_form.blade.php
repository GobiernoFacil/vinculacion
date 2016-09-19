@extends('layouts.master-admin')
@section('content')

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

{!! Form::model($user, ['url' => 'dashboard/yo/editar']) !!}

<p>
  <label>nombre</label>
  {{Form::text('name')}}
  @if($errors->has('name'))
    {{$errors->first('name', '<p>:message</p>')}}
  @endif
</p>

<p>
  <label>correo</label>
  {{Form::text('email')}}
  @if($errors->has('email'))
    {{$errors->first('email', '<p>:message</p>')}}
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
@endsection
