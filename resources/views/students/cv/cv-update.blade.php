@extends('layouts.master-admin')
@section('title', 'Actualizar CV')
@section('description', 'Actualizar currículo en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'student cv')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'cv-update')

@section('content')
<!-- Formulario de company -->
<div class="row">
  <div class="col-sm-12">
    @if(!$user->enabled)
    @include('students.alert-message')
    @endif
    <h1>Actualizar Currículum vitae</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
    {!! Form::model($cv,['url' => "tablero-estudiante/cv/editar/", "class" => "form-horizontal"]) !!}

    <!-- cosas de su objeto -->
    <fieldset>
      <h3>Datos Generales</h3>
      <div class="separator"></div>
      <p>
        <label>Curp </label>
        {{Form::text('curp',$user->student->curp,["class" => "form-control"])}}
        @if($errors->has('curp'))
        <strong>{{$errors->first('curp')}}</strong>
        @endif
      </p>

      <p>
        <label>Género</label>
        {{Form::select('gender',['1'=>'Femenino','0'=>'Masculino'],null,["class" => "form-control"])}}
        @if($errors->has('gender'))
        <strong>{{$errors->first('gender')}}</strong>
        @endif
      </p>
      <p>
        <label>Correo </label>
        {{Form::email('email',null,["class" => "form-control"])}}
        @if($errors->has('email'))
        <strong>{{$errors->first('email')}}</strong>
        @endif
      </p>
      <p>
        <label>Edad </label>
        {{Form::number('age',null,["class" => "form-control"])}}
        @if($errors->has('age'))
        <strong>{{$errors->first('age')}}</strong>
        @endif
      </p>
      <div class ="row">
        <div class = "col-sm-6">
          <p>
            <label>Ciudad</label>
            {{Form::text('city',null,["class" => "form-control"])}}
            @if($errors->has('city'))
            <strong>{{$errors->first('city')}}</strong>
            @endif
          </p>
        </div>
        <div class = "col-sm-6">
          <p>
            <label>Estado</label>
            {{Form::select('state', $states, null, ["class" => "form-control"])}}
            @if($errors->has('state'))
            <strong>{{$errors->first('state')}}</strong>
            @endif
          </p>
        </div>
      </div>
      <p>
        <label>País</label>
        {{Form::text('country',null,["class" => "form-control"])}}
        @if($errors->has('country'))
        <strong>{{$errors->first('country')}}</strong>
        @endif
      </p>
      <div class ="row">
        <div class = "col-sm-6">
          <p>
            <label>Teléfono</label>
            {{Form::number('phone',null,["class" => "form-control"])}}
            @if($errors->has('phone'))
            <strong>{{$errors->first('phone')}}</strong>
            @endif
          </p>
        </div>
        <div class = "col-sm-6">
          <p>
            <label>Celular </label>
            {{Form::number('mobile',null,["class" => "form-control"])}}
            @if($errors->has('mobile'))
            <strong>{{$errors->first('mobile')}}</strong>
            @endif
          </p>

        </div>
      </div>

      <div class ="row">
        <div class = "col-sm-6">
          <p>
            <label>Semestre</label>
            {{Form::number('semester',$user->student->semester,["class" => "form-control"])}}
            @if($errors->has('semester'))
            <strong>{{$errors->first('semester')}}</strong>
            @endif
          </p>
        </div>
        <div class = "col-sm-6">
          <p>
            <label>Estatus</label>
            {{Form::select('status',["ESTUDIANTE" => "ESTUDIANTE", "EGRESADO" => "EGRESADO"],$user->student->status,["class" => "form-control"])}}
            @if($errors->has('status'))
            <strong>{{$errors->first('status')}}</strong>
            @endif
          </p>

        </div>
      </div>


    </fieldset>

    <p>{{Form::submit('Actualizar',["class" => "btn"])}}</p>

    <!-- se cierra el form -->
    {!! Form::close() !!}

      <div class="separator"></div>
    <form id="extra-stuff" class="form-horizontal">

    <!-- studies -->
      <fieldset>
        <h2>Experiencia académica</h2>
        <ul id="studies-list">
          @foreach($cv->academic_trainings as $study)
          <li data-id="{{$study->id}}">
            {{$study->name}} : {{$study->institution}} <br>
            {{ date('m/Y', strtotime($study->from)) }} - {{ date('m/Y', strtotime($study->to)) }}
            <a href="#" class="remove-study">[ x ]</a>
          </li>
          @endforeach
        </ul>

        <p>
          <label>Carrera / curso:</label>
          <input type="text" name="study" id="study" class="form-control">
        </p>
        <p><label>Universidad:</label>
          <input type="text" name="institution" id="institution" class="form-control">
        </p>
        <p><label>Fecha de ingreso:</label>
          <input type="date" name="s_from" id="s_from" class="form-control">
        </p>
        <p>
          <label>Fecha de término:</label>
          <input type="date" name="s_to" id="s_to" class="form-control">
        </p>
        <p><label>Ciudad:</label>
          <input type="text" name="study_city" id="study_city" class="form-control">
        </p>

        <p>
          <a id="add-study" href="#" class="btn edit">Agregar experiencia académica</a>
        </p>
      </fieldset>


      <!-- experiencies -->
      <fieldset>
        <h2>Experiencia laboral</h2>
        <ul id="experiencies-list">
          @foreach($cv->experiences as $experience)
          <li data-id="{{$experience->id}}">
            {{$experience->name}} : {{$experience->company}} <br>
            {{$experience->description}}
            <a href="#" class="remove-experience">[ x ]</a>
          </li>
          @endforeach
        </ul>

        <p>
          <label>Empleo:</label>
          <input type="text" name="experience" id="experience" class="form-control">
        </p>
        <p><label>Empresa:</label>
          <input type="text" name="company" id="company" class="form-control">
        </p>
        <p><label>Sector:</label>
          <input type="text" name="sector" id="sector" class="form-control">
        </p>
        <p><label>Fecha de ingreso:</label>
          <input type="date" name="from" id="from" class="form-control">
        </p>
        <p>
          <label>Fecha de término:</label>
          <input type="date" name="tod" id="tod" class="form-control">
        </p>
        <p><label>Ciudad:</label>
          <input type="text" name="experience_city" id="experience_city" class="form-control">
        </p>
        <p><label>Estado:</label>
          <input type="text" name="experience_state" id="experience_state" class="form-control">
        </p>
        <p><label>Descripción:</label>
          <textarea type="text" name="experience_description" id="experience_description" class="form-control"></textarea>
        </p>

        <p>
          <a id="add-experience" href="#" class="btn edit">Agregar experiencia</a>
        </p>
      </fieldset>
      <!-- idiomas -->
      <fieldset>
      <div class="separator"></div>
        <h2>Idiomas</h2>
        <ul id="languages-list">
          @foreach($cv->languages as $language)
          <li data-id="{{$language->id}}">
            {{$language->name}} : {{$language->level}}
            <a href="#" class="remove-language">[ x ]</a>
          </li>
          @endforeach
        </ul>

        <p><label>Idioma:</label> <input type="text" name="language" id="language" class="form-control"></p>
        <p><label>Nivel:</label>
          <select name="language_level" id="language_level" class="form-control">
            <option>básico</option>
            <option>intermedio</option>
            <option>avanzado</option>
          </select>
        </p>
        <p>
          <a id="add-language" href="#" class="btn edit">Agregar idioma</a>
        </p>
        <div class="separator"></div>
      </fieldset>

      <!-- software -->
      <fieldset>
        <h2>Software</h2>
        <ul id="softwares-list">
          @foreach($cv->softwares as $software)
          <li data-id="{{$software->id}}">
            {{$software->name}} : {{$software->level}}
            <a href="#" class="remove-software">[ x ]</a>
          </li>
          @endforeach
        </ul>

        <p>
          <label>Programa:</label>
          <input type="text" name="software" id="software" class="form-control">
        </p>
        <p><label>Nivel:</label>
          <select name="software_level" id="software_level" class="form-control">
            <option>básico</option>
            <option>intermedio</option>
            <option>avanzado</option>
          </select>
        </p>
        <p>
          <a id="add-software" href="#" class="btn edit">Agregar programa</a>
        </p>
      </fieldset>
    </form>
  </div>
</div>
<script src="{{url("js/bower_components/jquery/dist/jquery.min.js")}}"></script>
<script>
var CVID = {{$cv->id}};
// Laravel.csrfToken
$(function(){

  // PREVENT SUBMIT
  $("#extra-stuff").on("submit", function(e){
    return false;
  });

  // LANGUAGE "CRUD"
  // ADD
  $("#add-language").on("click", function(e){
    e.preventDefault();
    var name  = $("#language").val(),
    level = $("#language_level").val(),
    url   = "{{url("tablero-estudiante/idioma/agregar")}}";

    $.post(url, {name : name, level:level, _token : Laravel.csrfToken}, function(d){
      console.log(d);
      var el  = "<li data-id='" + d.id + "'>" +
      d.name + " : " + d.level +
      " <a href='#' class='remove-language'>[ x ]</a></li>";
      $("#languages-list").append(el);
    }, "json");
  });

  // LANGUAGE "CRUD"
  // REMOVE
  $("#languages-list").on("click", ".remove-language", function(e){
    e.preventDefault();
    var li = $(e.currentTarget).parent(),
    id = li.attr("data-id"),
    url = "{{url("tablero-estudiante/idioma/eliminar")}}";

    $.post(url + "/" + id, {id : id, _token : Laravel.csrfToken}, function(d){
      li.remove();
    }, "json");
  });

  // SOFTWARE "CRUD"
  // ADD
  $("#add-software").on("click", function(e){
    e.preventDefault();
    var name  = $("#software").val(),
    level = $("#software_level").val(),
    url   = "{{url("tablero-estudiante/programa/agregar")}}";

    $.post(url, {name : name, level:level, _token : Laravel.csrfToken}, function(d){
      console.log(d);
      var el  = "<li data-id='" + d.id + "'>" +
      d.name + " : " + d.level +
      " <a href='#' class='remove-software'>[ x ]</a></li>";
      $("#softwares-list").append(el);
    }, "json");
  });

  // SOFTWARE "CRUD"
  // REMOVE
  $("#softwares-list").on("click", ".remove-software", function(e){
    e.preventDefault();
    var li = $(e.currentTarget).parent(),
    id = li.attr("data-id"),
    url = "{{url("tablero-estudiante/programa/eliminar")}}";

    $.post(url + "/" + id, {id : id, _token : Laravel.csrfToken}, function(d){
      li.remove();
    }, "json");
  });

// Experiences "CRUD"
// ADD
$("#add-experience").on("click", function(e){
  e.preventDefault();
  var name        = $("#experience").val(),
      company     = $("#company").val(),
      sector      = $("#sector").val(),
      from        = $("#from").val(),
      to          = $("#tod").val(),
      city        = $("#experience_city").val(),
      state       = $("#experience_state").val(),
      description = $("#experience_description").val(),
      url         = "{{url("tablero-estudiante/experiencia/agregar")}}";

  $.post(url, {name : name, company:company,sector:sector,from:from,to:to,city:city,state:state,description:description, _token : Laravel.csrfToken}, function(d){
    var el  = "<li data-id='" + d.id + "'>" +
    d.name + " : " + d.company + "<br>" + d.description
    " <a href='#' class='remove-experience'>[ x ]</a></li>";
    $("#experiencies-list").append(el);
  }, "json");
});

// experience "CRUD"
// REMOVE
$("#experiencies-list").on("click", ".remove-experience", function(e){
  e.preventDefault();
  var li = $(e.currentTarget).parent(),
  id = li.attr("data-id"),
  url = "{{url("tablero-estudiante/experiencia/eliminar")}}";

  $.post(url + "/" + id, {id : id, _token : Laravel.csrfToken}, function(d){
    li.remove();
  }, "json");
});

// Studies "CRUD"
// ADD
$("#add-study").on("click", function(e){
  e.preventDefault();
  var name        = $("#study").val(),
      institution = $("#institution").val(),
      from        = $("#s_from").val(),
      to          = $("#s_to").val(),
      city        = $("#study_city").val(),
      url         = "{{url("tablero-estudiante/estudios/agregar")}}";

  $.post(url, {name : name, institution:institution,from:from,to:to,city:city, _token : Laravel.csrfToken}, function(d){
    var from = d.from.split("-"),
        to   = d.to.split("-"),
        el  = "<li data-id='" + d.id + "'>" +
    d.name + " : " + d.institution + "<br>" + from[1] + "/" + from[0] + " - " + to[1] + "/" + to[0] + 
    " <a href='#' class='remove-study'>[ x ]</a></li>";
    $("#studies-list").append(el);
  }, "json");
});

// experience "CRUD"
// REMOVE
$("#studies-list").on("click", ".remove-study", function(e){
  e.preventDefault();
  var li = $(e.currentTarget).parent(),
  id = li.attr("data-id"),
  url = "{{url("tablero-estudiante/estudios/eliminar")}}";

  $.post(url + "/" + id, {id : id, _token : Laravel.csrfToken}, function(d){
    li.remove();
  }, "json");
});
});
</script>
@endsection
