@extends('layouts.master-admin')
@section('title', 'Lista de Estudiantes por Habilitar')
@section('description', 'Lista de Estudiantes del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd estudiantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'estudiantes usuarios disabled')

@section('content')
<div class="row">
<!-- Estudiantes -->
  <div class="col-sm-12">
    <h1>Lista de estudiantes por habilitar en la plataforma</h1>
  </div>
  @if(Session::has('message'))
    <div class="col-sm-12 message success">
        {{ Session::get('message') }}
    </div>
@endif
	<div class="col-sm-5">
  		<p><a href="{{url('tablero-opd/estudiantes')}}" class="btn">&lt; Lista de Estudiantes de la Universidad</a></p>
  	</div>
  	
    
    <div class="col-sm-12">
      <p>Esta lista de estudiantes corresponde a los usuarios que no están habilitados en la plataforma, para ver los estudiantes registrados en la Universidad, da clic <a href="{{ url('tablero-opd/estudiantes') }}">aquí</a>.</p>
    </div>
  <div class="col-sm-12">
  @if($students->count())
    <ul class="list">
      <li class="clearfix titles">
          <span class="col-sm-2">Matricula</span>
          <span class="col-sm-4">Nombre</span>
          <span class="col-sm-2">Carrera</span>
          <span class="col-sm-2">Status</span>
          <span class="col-sm-2">Acciones</span>
      </li>
    @foreach($students as $student)
    	@if($student->user->enabled == 0 )
      <li class="clearfix">
      <span class="col-sm-2">{{$student->matricula}}</span>
      <span class="col-sm-4"><a href="{{url("tablero-opd/estudiante/ver/{$student->id}")}}">
        {{empty($student->nombre) ? $student->nombre_completo : $student->nombre}}
        </a><br>
        <span class="note">Actualizado: {{date('d-m-Y', strtotime($student->updated_at))}}</span>
      </span>
      <span class="col-sm-2">{{$student->carrera}}</span>
      <span class="col-sm-2">{!! $student->user->enabled == 1 ? '<span class="enabled">Habilitado</span>' : '<span class="disabled">Deshabilitado</span>' !!}</span>
      <span class="col-sm-2">
       
        <a href="{{url("tablero-opd/estudiante/editar/{$student->id}")}}" class="btn add xs">Editar</a>
         <a href="{{url("tablero-opd/estudiante/activar/{$student->id}")}}" class="btn xs">
          {{$student->user->enabled ? "Deshabilitar" : "Habilitar"}}
        </a>        <a href="{{url("tablero-opd/estudiante/eliminar/{$student->id}")}}" class="btn danger xs" onclick = "return confirm('¿Estás seguro?')">Eliminar</a>
      </span>

      </li>
      @endif
    @endforeach
    </ul>

  @else
    <p>No hay Alumnos registrados como usuarios en la plataforma.</p>
  @endif


  {{ $students->links() }}
  </div>
</div>
@endsection
