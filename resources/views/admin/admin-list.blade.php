@extends('layouts.master-admin')
@section('content')

<!-- Admins -->
<h1>Admins</h1>
@if($admins->count())
  <ul>
  @foreach($admins as $admin)
    <li><a href="{{url("dashboard/administrador/{$admin->id}")}}"> {{$admin->name}}</a></li>
  @endforeach
  </ul>

@else
  <p>Eres el único administrador</p>
@endif

<p><a href="{{url("dashboard/administrador/crear")}}">Crear administrador</a></p>


{{ $admins->links() }}
@endsection
