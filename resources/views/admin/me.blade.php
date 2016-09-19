@extends('layouts.master-admin')
@section('content')

<!-- Perfil -->
<h4>Mi perfil</h4>

<p>nombre: {{$user->name}}</p>
<p>correo: {{$user->email}}</p>

<p><a href="{{url('dashboard/yo/editar')}}">editar</a></p>
@endsection
