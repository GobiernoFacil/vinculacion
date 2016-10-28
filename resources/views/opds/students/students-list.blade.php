@extends('layouts.master-admin')
@section('title', 'Lista de Estudiantes')
@section('description', 'Lista de Estudiantes del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd estudiantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'estudiantes')

@section('content')
<div class="row">
<!-- Estudiantes -->
  <div class="col-sm-12">
    <h1>Estudiantes</h1>
  </div>
    <div class="col-sm-3 col-sm-offset-6">
  		<p><a href="{{url("tablero-opd/estudiante/crear")}}" class="btn add"> + Agregar Estudiante</a></p>
  	</div>
    <div class="col-sm-3">
  		<p><a href="{{url("tablero-opd/estudiantes/actualizar/xlsx")}}" class="btn add">+ Agregar varios estudiantes</a></p>
  	</div>
  	<div class="col-sm-12">
  		<p>Esta lista de estudiantes corresponde a los registrados en la Universidad, para ver los estudiantes usuarios de la plataforma de clic <a href="{{ url('tablero-opd/estudiantes/usuarios') }}">aquí</a>.</p>
  	</div>
    @if(Session::has('message'))
      <div class="col-sm-12 message success">
          {{ Session::get('message') }}
      </div>
  @endif
  <div class="col-sm-12">
  @if($students->count())
    <ul class="list">
      <li class="clearfix titles">
          <span class="col-sm-2 col-xs-3">Matricula</span>
          <span class="col-sm-4 col-xs-5">Nombre</span>
          <span class="col-sm-2 col-xs-4">Carrera</span>
          <span class="col-sm-2 nomobile">Status</span>
          <span class="col-sm-2 nomobile">Acciones</span>
      </li>
    @foreach($students as $student)
      <li class="clearfix">
      <span class="col-sm-2 col-xs-3">{{$student->matricula}}</span>
      <span class="col-sm-4 col-xs-5"><a href="{{url("tablero-opd/estudiante/ver/{$student->id}")}}">
        {{empty($student->nombre) ? $student->nombre_completo : $student->nombre}}
        </a><br>
        <span class="note">Actualizado: {{date('d-m-Y', strtotime($student->updated_at))}}</span>
      </span>
      <span class="col-sm-2 col-xs-4">{{$student->carrera}}</span>
      <span class="col-sm-2 col-xs-6">{{$student->status}}</span>
      <span class="col-sm-2 col-xs-6 right">
				<a href="{{url("tablero-opd/estudiante/editar/{$student->id}")}}" class="btn xs">Editar</a>
				<a href="{{url("tablero-opd/estudiante/eliminar/{$student->id}")}}" class="btn danger xs" onclick = "return confirm('¿Estás seguro?')">Eliminar</a>
			</span>

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
