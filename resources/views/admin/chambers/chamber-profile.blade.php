@extends('layouts.master-admin')
@section('content')

<!-- Perfil -->
<h4>Perfil de la cámara</h4>

<p>nombre: {{$chamber->name}}</p>
<p>correo: {{$chamber->email}}</p>

<!-- cosas de la cámara -->
@if($chamber->has('chamber'))
  <p>nombre comericial: {{$chamber->chamber->chamber_comercial_name}}</p>
@endif

<p><a href="{{url("dashboard/camara/editar/{$chamber->id}")}}">editar</a></p>
<p><a href="{{url("dashboard/camara/eliminar/{$chamber->id}")}}">eliminar</a></p>
@endsection
