@extends('layouts.master-admin')
@section('title', 'Lista de Estudiantes')
@section('description', 'Lista de Estudiantes del Gobierno del Estado de Puebla')
@section('bodyclass', 'estudiantes')
<?php /* 
@section('breadcrumb', 'layouts.breadcrumb') 
@section('breadcrumb_a', 'estudiantes')
*/ ?>
@section('content')
<div class="row">
<!-- Estudiantes -->
  <div class="col-sm-12">
    <h1>Estudiantes</h1>
  </div>
  <p>
    
    <a href="{{url("tablero-opd/estudiante/crear")}}">Agregar un estudiante</a><br>
    <a href="{{url("tablero-opd/estudiantes/actualizar/xlsx")}}">Agregar estudiantes mediante un archivo</a>
  </p>
  <div class="col-sm-12">
  @if($students->count())
    <ul class="list">
      <li class="row titles">
          <span class="col-sm-2">Matricula</span>
          <span class="col-sm-4">Nombre</span>
          <span class="col-sm-3">Carrera</span>
          <span class="col-sm-3">Status</span>
      </li>
    @foreach($students as $student)
      <li class="row">
      <span class="col-sm-2">{{$student->matricula}}</span>
      <span class="col-sm-4"><a href="{{url("dashboard/estudiante/{$student->id}")}}">
        {{empty($student->nombre) ? $student->nombre_completo : $student->nombre}}
        </a><br>
        <span class="note">Actualizado: {{date('d-m-Y', strtotime($student->updated_at))}}</span>
      </span>
      <span class="col-sm-3">{{$student->carrera}}</span>
      <span class="col-sm-3">{{$student->status}}</span>

      </li>
    @endforeach
    </ul>
  
  @else
    <p>No hay Alumnos registrados</p>
  @endif
  
  
  {{ $students->links() }}
  </div>
</div>
@endsection