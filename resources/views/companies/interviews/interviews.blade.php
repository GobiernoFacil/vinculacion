@extends('layouts.master-admin')
@section('title', 'Tus entrevistas en la plataforma Empleo Abierto')
@section('description', 'Entrevistas en la plataforma Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company entrevistas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'entrevistas')

@section('content')
<div class="row">
  <!-- Vacantes -->
  <div class="col-sm-12">
    @if(!$user->enabled)
    @include('companies.alert-message')
    @endif
    @if(Session::has('message'))
      <div class="col-sm-12 message success">
          {{ Session::get('message') }}
      </div>
  @endif
    <h1>Entrevistas</h1>
  </div>
  <div class="col-sm-12">
	  @if($interviews->count() > 0)
	  	<ul class="list">
        <li class="clearfix titles">
          <span class="col-sm-3 col-xs-4">Vacante</span>
          <span class="col-sm-9 col-xs-8">
          	<span class="col-sm-5 col-xs-5">Nombre / Carrera / Universidad</span>
          	<span class="col-sm-3 col-xs-3">Lugar / Fecha</span>
          	<span class="col-sm-3 nomobile">Contacto</span>
          </span>
        </li>
	  	@foreach ($company->vacancies as $vacant)
	  	<li class="clearfix">
	  	<span class="col-sm-3 col-xs-4">
          	<a href="{{url("tablero-empresa/vacante/{$vacant->id}")}}" class="link_view"> {{$vacant->job}}</a>
          	<br>
          	<span class="note">Carrera: {{$vacant->tags}}</span><br>
          	<span class="note {{$vacant->status == 1 ? 'ena' : 'disa' }}">{{$vacant->status == 1 ? "Publicado" : "Sin Publicar" }}</span>
          </span>
          <span class="col-sm-9 col-xs-8">
          	@foreach($vacant->interviews as $interview)
		  		<ol>
			  		<li class="clearfix">
			  			<span class="col-sm-5">
			  				<a href="{{url("tablero-empresa/vacante/{$vacant->id}/entrevista/{$interview->id}")}}">
							{{ucwords(strtolower($interview->student->nombre . ' ' . $interview->student->apellido_paterno))}}</a><br>
							<span class="note">{{$interview->student->carrera}} </span><br>
							<span class="note">{{$interview->student->opd->opd_name}} </span>
						</span>
							
						<span class="col-sm-3"> {{$interview->address}} <br>  {{$interview->date}},  {{$interview->time}}
						<br><a href="{{url("tablero-empresa/vacante/{$vacant->id}/entrevista/{$interview->id}")}}" class="btn xs">Ver</a>
						</span>
						<span class="col-sm-3">{{$interview->contact}} <br>
						{{$interview->email}}<br>
						{{$interview->phone}}
						</span>
					</li>
		  		</ol>
	  		@endforeach
          </span>
          <span class="col-sm-2">
          </span>
	  	</li>
	  	@endforeach
	  	</ul>
	  @else
	  <p>No tienes entrevistas</p>
	  @endif
  </div>
</div>

@endsection