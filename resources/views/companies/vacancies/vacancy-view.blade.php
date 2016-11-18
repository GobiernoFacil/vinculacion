@extends('layouts.master-admin')
@section('title', $vacancy->job)
@section('description', 'Ver vacante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'company vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'vacante ver')

@section('content')
  <!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      @if(!$user->enabled)
          @include('companies.alert-message')
      @endif
      @if(Session::has('message'))
        <div class="col-sm-12 message success">
            {{ Session::get('message') }}
        </div>
    @endif
    </div>
    <div class="col-sm-8">
    	<h1>{{$vacancy->job}}</h1>
    	<div class="row">
	    	<div class="col-sm-6">
				<p>Creado: {{date('d-m-Y', strtotime($vacancy->created_at))}} - Actualizado: {{date('d-m-Y', strtotime($vacancy->updated_at))}}</p>
				<h5 class="{{$vacancy->status == 1 ? 'ena' : 'disa' }}">{{$vacancy->status == 1 ? "Vacante Publicada" : "Vacante Sin Publicar" }}</h5>
	    	</div>
	    	<div class="col-sm-6">
	    		<p class="right">Ubicación: {{$vacancy->city . ', ' . $vacancy->state}}</p>
	    	</div>
    	</div>
    </div>
    <div class="col-sm-4">
	    <div class="row opd_location">
		  	 <div class="col-sm-6">
			    <h3>Aplicaron</h3>
			    @if($vacancy->applicants()->count() > 0)
			    <h2><a href="#applicants">{{$vacancy->applicants()->count()}}</a></h2>
			    @else
			    <h2>{{$vacancy->applicants()->count()}}</h2>
			    @endif
    		</div>
    		 <div class="col-sm-6">
			    <h3>Entrevistas</h3>
			    @if($vacancy->applicants()->count() > 0)
    			<h2><a href="#interviews">{{$vacancy->interviews()->count()}}</a></h2>
    			@else
			    <h2>{{$vacancy->interviews()->count()}}</h2>
			    @endif
    		</div>
	    </div>
    </div>
  </div>
    <div class="separator"></div>
  <div class="row">
  	<div class="col-sm-4">
		<h3>Carrera: {{$vacancy->tags}}</h3>
		<p>Especialidad: {{$vacancy->speciality}}</p>
  	</div>
  	<div class="col-sm-4">
		<h3>Sueldo: ${{number_format($vacancy->salary,2, '.', ',')}}</h3>
		<p>Tipo de salario: {{$vacancy->salary_type}}</p>
  	</div>
  	<div class="col-sm-4">
		<h3>Experiencia: {{$vacancy->experience}}</h3>
  	</div>
  </div>

  <div class="row">
  	<div class="col-sm-6">
	  <h3 class="separator">Requisitos</h3>
	  <p>Descripción:</p>
	  <ul class="list_perks">
		  <li><strong>Edad</strong>: {{$vacancy->age_from . ' - ' . $vacancy->age_to}}</li>
		  <li><strong>Personalidad</strong>: {{$vacancy->personality	  }}</li>
		  <li><strong>Horario</strong>: {{$vacancy->work_from}} - {{$vacancy->work_to }}</li>
		  <li>{{$vacancy->travel == 1 ? 'Disponibilidad para viajar requerida.' : 'Disponibilidad para viajar no requerida.'}}</li>
		  <li>{{$vacancy->location == 1 ? 'Posibilidad de cambio de domicilio requerida.' : 'Posibilidad de cambio de domicilio no requerida.'}}</li>
	  </ul>
  	</div>
  	<div class="col-sm-6">
	  <h3 class="separator">Ofrecemos</h3>
	  <ul class="list_perks">
	  	<li><strong>Beneficios</strong>: {{$vacancy->benefits		  }}</li>
	  	<li><strong>Gastos Pagados</strong>: {{ $vacancy->expenses }}</li>
	  	<li><strong>Capacitación</strong>: {{$vacancy->training		  }}</li>
	  	<li><strong>Sueldo mínimo</strong>: ${{ number_format($vacancy->salary_min,2, '.', ',') }}</li>
	  	<li><strong>Sueldo máximo</strong>: ${{ number_format($vacancy->salary_max,2, '.', ',') }}</li>
	  	{!! $vacancy->salary_extra ? '<li>' . $vacancy->salary_extra . '</li>' : '' !!}
	  	{!! $vacancy->salary_variable ? '<li>' . $vacancy->salary_variable . '</li>' : '' !!}
	  	{!! $vacancy->contract_level ? '<li>' . $vacancy->contract_level . '</li>' : '' !!}
	  	{!! $vacancy->contract_type ? '<li>' . $vacancy->contract_type . '</li>' : '' !!}
	  	<li><strong>Más información</strong>: {{$vacancy->url  		  }}</li>
	  </ul>
  	</div>
  </div>
  <div class="row">
  	<div class="col-sm-4">
	  	@if($user->enabled)
    	<p><a href="{{url("tablero-empresa/vacante/habilitar/{$vacancy->id}")}}" class="btn add">{{$vacancy->status == 1 ? "Ocultar Vacante" : "Publicar Vacante" }}</a></p>
    	@endif
  	</div>
  	<div class="col-sm-4">
    	<p><a href="{{url("tablero-empresa/vacante/editar/{$vacancy->id}")}}" class="btn">Editar Vacante</a></p>
  	</div>
  	<div class="col-sm-4">
    	<p><a data-job="{{$vacancy->job}}" href="{{url("tablero-empresa/vacante/eliminar/{$vacancy->id}")}}" class="btn danger">Eliminar Vacante</a></p>
  	</div>
  </div>
  <div class="separator"></div>
  <div class="row">
  	<div class="col-sm-12">
    @if($user->enabled)
      <h2 id="applicants">{{ $vacancy->applicants()->count() == 1 ? $vacancy->applicants()->count() . ' estudiante aplicó a la vacante' : $vacancy->applicants()->count() . ' estudiantes aplicaron a la vacante' }}</h2>
      @if($vacancy->applicants()->count())
        <ul class="list">
	        <li class="clearfix title">
	        	<span class="col-sm-4">Nombre</span>
	        	<span class="col-sm-3">Carrera</span>
	        	<span class="col-sm-3">Universidad</span>
	        </li>
        @foreach($vacancy->applicants as $applicant)
        <li class="clearfix">
        	<span class="col-sm-4"><a href="{{url("tablero-empresa/vacante/{$vacancy->id}/estudiante/{$applicant->student->id}")}}">
            {{ucwords(strtolower($applicant->student->nombre . ' ' . $applicant->student->apellido_paterno))}}
          </a></span>
          <span class="col-sm-3"> [ {{$applicant->student->carrera}} ] </span>
          <span class="col-sm-3">{{$applicant->student->opd->opd_name}}</span>
          <span class="col-sm-2"><a href="{{url('tablero-empresa/vacante/{$vacancy->id}/estudiante/{$applicant->student->id}')}}" class="btn xs">Ver candidato</a></span>
        </li>
        @endforeach
        </ul>
      @else
        <p>No aplicaron</p>
      @endif
    @endif
	
	@if($vacancy->interviews->count() > 0)
		<div class="separator"></div>
		<h2 id="interviews">{{ $vacancy->interviews()->count() == 1 ? $vacancy->interviews()->count() . ' estudiante con entrevista' : $vacancy->interviews()->count() . ' estudiantes con entrevistas' }}</h2>
	 <ul class="list">
	        <li class="clearfix title">
	        	<span class="col-sm-4">Nombre / Carrera / Universidad</span>
	        	<span class="col-sm-3">Lugar / Fecha</span>
	        	<span class="col-sm-3">Contacto</span>
	        	<span class="col-sm-2"></span>
	        </li>
		@foreach ($vacancy->interviews as $interview)
			<li class="clearfix">
        		<span class="col-sm-4">
        			<a href="{{url("tablero-empresa/vacante/{$vacancy->id}/entrevista/{$interview->id}")}}">
					{{ucwords(strtolower($interview->student->nombre . ' ' . $interview->student->apellido_paterno))}}</a><br>
					<span class="note">{{$interview->student->carrera}} </span><br>
					<span class="note">{{$interview->student->opd->opd_name}} </span>
				</span>
        	  <span class="col-sm-3"> {{$interview->address}} <br>  {{$interview->date}},  {{$interview->time}}</span>
        	  <span class="col-sm-3">{{$interview->contact}} <br>
        	  {{$interview->email}}<br>
        	  	{{$interview->phone}}
        	  </span>
        	  <span class="col-sm-2"><a href="{{url("tablero-empresa/vacante/{$vacancy->id}/entrevista/{$interview->id}")}}" class="btn xs">Ver</a></span>
        	</li>
		@endforeach
	 </ul>
	@endif



    </div>
  </div>
  
  <script>
  var dButtons = document.querySelectorAll(".danger");

  if(dButtons.length){
    for(var i =0; i < dButtons.length; i++){
      dButtons[i].addEventListener("click", function(e){
        var d = confirm("¿Deseas eliminar la vacante: " + this.getAttribute("data-job"));
        if(!d){
          e.preventDefault();
        }
      });
    }
  }
</script>
@endsection
