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
        <h5>Datos del Currículo</h5>
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
              {{Form::text('state',null,["class" => "form-control"])}}
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

      </fieldset>

      <p>{{Form::submit('Actualizar',["class" => "btn"])}}</p>

      <!-- se cierra el form -->
      {!! Form::close() !!}


      <form id="extra-stuff">
        <!-- idiomas -->
        <fieldset>
          <h5>idiomas</h5>
          <ul id="languages-list">
          @foreach($cv->languages as $language)
            <li data-id="{{$language->id}}">
              {{$language->name}} : {{$language->level}}
              <a href="#" class="remove-language">[ x ]</a>
            </li>
          @endforeach
          </ul>

          <p>
            idioma: <input type="text" name="language" id="language"><br>
            nivel: 
            <select name="language_level" id="language_level">
              <option>básico</option>
              <option>intermedio</option>
              <option>avanzado</option>
            </select>
            <br>
            <a id="add-language" href="#">Agregar idioma</a>
          </p>
        </fieldset>

        <!-- software -->
        <fieldset>
          <h5>Software</h5>
          <ul id="softwares-list">
          @foreach($cv->softwares as $software)
            <li data-id="{{$software->id}}">
              {{$software->name}} : {{$software->level}}
              <a href="#" class="remove-software">[ x ]</a>
            </li>
          @endforeach
          </ul>

          <p>
            programa: <input type="text" name="software" id="software"><br>
            nivel: 
            <select name="software_level" id="software_level">
              <option>básico</option>
              <option>intermedio</option>
              <option>avanzado</option>
            </select>
            <br>
            <a id="add-software" href="#">Agregar programa</a>
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


// SOFTWARE: 'cv_id', 'name', 'level'
// academic_trainings: 'cv_id', 'name', 'from', 'to', 'institution', 'city'
    });
  </script>
@endsection