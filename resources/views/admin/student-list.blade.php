@extends('layouts.master-admin')
@section('content')

<!-- chambers -->
<h4>Estudiantes</h4>
@if($students->count())
  <ul>
  @foreach($students as $student)
    <li><a href="{{url("dashboard/estudiante/{$student->id}")}}"> {{$student->name}}</a></li>
  @endforeach
  </ul>

@else
  <p>No hay estudiantes registrados</p>
@endif

<p><a href="{{url("dashboard/estudiante/crear")}}">Crear estudiante</a></p>


{{ $students->links() }}
@endsection