@extends('layouts.master-admin')
@section('title', 'Mi perfil')
@section('description', 'Mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'me')
@section('content')

<!-- Perfil -->
<h4>Mi perfil</h4>

<p>nombre: {{$user->name}}</p>
<p>correo: {{$user->email}}</p>

<p><a href="{{url('dashboard/yo/editar')}}">editar</a></p>
@endsection
