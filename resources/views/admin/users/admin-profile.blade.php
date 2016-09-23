@extends('layouts.master-admin')
@section('content')

<!-- Perfil -->
<h4>Perfil de administrador</h4>

<p>nombre: {{$admin->name}}</p>
<p>correo: {{$admin->email}}</p>

<p><a href="{{url("dashboard/administrador/editar/{$admin->id}")}}">editar</a></p>
<p><a href="{{url("dashboard/administrador/eliminar/{$admin->id}")}}">eliminar</a></p>
@endsection
