@extends('layouts.master-admin')
@section('content')

<!-- chambers -->
<h4>Cámaras</h4>
@if($chambers->count())
  <ul>
  @foreach($chambers as $chamber)
    <li><a href="{{url("dashboard/camara/{$chamber->id}")}}"> {{$chamber->chamber->chamber_comercial_name}}</a></li>
  @endforeach
  </ul>

@else
  <p>No hay cámaras registradas</p>
@endif

<p><a href="{{url("dashboard/camara/crear")}}">Crear cámara</a></p>


{{ $chambers->links() }}
@endsection
