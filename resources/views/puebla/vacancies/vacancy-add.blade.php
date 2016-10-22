@extends('layouts.master-admin')
@section('title', 'Agregar Vacante')
@section('description', 'Agregar nueva vacante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'puebla vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_p', 'vacante add')

@section('content')
  <!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      <h1>Agregar vacante</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::open(['url' => "tablero-secotrade/vacante/crear", "class" => "form-horizontal"]) !!}

      <!-- cosas de su objeto -->
      <fieldset>
        <h5>Datos de la vacante</h5>

        <p>
          <label>Vacante</label>
          {{Form::text('job',null,["class" => "form-control"])}}
          @if($errors->has('job'))
          <strong>{{$errors->first('job')}}</strong>
          @endif
        </p>

        <p>
          <label>Carreras</label>
          {{Form::text('tags',null,["class" => "form-control", "id" => "tags"])}}
          @if($errors->has('tags'))
          <strong>{{$errors->first('tags')}}</strong>
          @endif
        </p>
        <p>
          <label>Especialidad</label>
          {{Form::text('speciality',null,["class" => "form-control"])}}
          @if($errors->has('speciality'))
          <strong>{{$errors->first('speciality')}}</strong>
          @endif
        </p>

        <p>
          <label>Salario</label>
          {{Form::text('salary',null,["class" => "form-control"])}}
          @if($errors->has('salary'))
          <strong>{{$errors->first('salary')}}</strong>
          @endif
        </p>

        <div class ="row">
          <div class = "col-md-6">
            <p>
              <label>Edad mínima</label>
              {{Form::text('age_from',null,["class" => "form-control"])}}
              @if($errors->has('age_from'))
              <strong>{{$errors->first('age_from')}}</strong>
              @endif
            </p>
          </div>
          <div class = "col-md-6">
            <p>
              <label>Edad maxíma</label>
              {{Form::text('age_to',null,["class" => "form-control"])}}
              @if($errors->has('age_to'))
              <strong>{{$errors->first('age_to')}}</strong>
              @endif
            </p>
          </div>
        </div>
        <p>
          <label>Disponibilidad para viajar</label>
          {{Form::select('travel',['1'=>'Sí','0'=>'No'],null,["class" => "form-control"])}}
          @if($errors->has('travel'))
          <strong>{{$errors->first('travel')}}</strong>
          @endif
        </p>
        <p>
          <label>Posibilidad de cambio de domicilio</label>
          {{Form::select('location',['1'=>'Sí','0'=>'No'],null,["class" => "form-control"])}}
          @if($errors->has('location'))
          <strong>{{$errors->first('location')}}</strong>
          @endif
        </p>
        <p>
          <label>Experiencia</label>
          {{Form::textarea('experience',null,["class" => "form-control"])}}
          @if($errors->has('experience'))
          <strong>{{$errors->first('experience')}}</strong>
          @endif
        </p>
        <div class ="row">
          <div class = "col-md-6">
            <p>
              <label>Hora de entrada</label>
              {{Form::text('work_from',null,["class" => "form-control"])}}
              @if($errors->has('work_from'))
              <strong>{{$errors->first('work_from')}}</strong>
              @endif
            </p>
          </div>

          <div class = "col-md-6">
            <p>
              <label>Hora de salida</label>
              {{Form::text('work_to',null,["class" => "form-control"])}}
              @if($errors->has('work_to'))
              <strong>{{$errors->first('work_to')}}</strong>
              @endif
            </p>
          </div>

        </div>
        <p>
          <label>Beneficios</label>
          {{Form::textarea('benefits',null,["class" => "form-control"])}}
          @if($errors->has('benefits'))
          <strong>{{$errors->first('benefits')}}</strong>
          @endif
        </p>

        <p>
          <label>Gastos Pagados</label>
          {{Form::textarea('expenses',null,["class" => "form-control"])}}
          @if($errors->has('expenses'))
          <strong>{{$errors->first('expenses')}}</strong>
          @endif
        </p>
        <p>
          <label>Capacitación</label>
          {{Form::textarea('training',null,["class" => "form-control"])}}
          @if($errors->has('training'))
          <strong>{{$errors->first('training')}}</strong>
          @endif
        </p>
        <p>
          <label>Estado</label>
          {{Form::text('state',null,["class" => "form-control"])}}
          @if($errors->has('state'))
          <strong>{{$errors->first('state')}}</strong>
          @endif
        </p>
        <p>
          <label>Ciudad</label>
          {{Form::text('city',null,["class" => "form-control"])}}
          @if($errors->has('city'))
          <strong>{{$errors->first('city')}}</strong>
          @endif
        </p>
        <div class ="row">
          <div class = "col-md-6">
            <p>
              <label>Sueldo mínimo</label>
              {{Form::number('salary_min',null,["class" => "form-control"])}}
              @if($errors->has('salary_min'))
              <strong>{{$errors->first('salary_min')}}</strong>
              @endif
            </p>
          </div>
          <div class = "col-md-6">
            <p>
              <label>Sueldo Máximo</label>
              {{Form::number('salary_max',null,["class" => "form-control"])}}
              @if($errors->has('salary_max'))
              <strong>{{$errors->first('salary_max')}}</strong>
              @endif
            </p>
          </div>
        </div>
        <p>
          <label>Personalidad</label>
          {{Form::textarea('personality',null,["class" => "form-control"])}}
          @if($errors->has('personality'))
          <strong>{{$errors->first('personality')}}</strong>
          @endif
        </p>
        <p>
          <label>Url</label>
          {{Form::text('url',null,["class" => "form-control"])}}
          @if($errors->has('url'))
          <strong>{{$errors->first('url')}}</strong>
          @endif
        </p>

      </fieldset>



      <p>{{Form::submit('Crear',["class" => "btn"])}}</p>

      <!-- se cierra el form -->
      {!! Form::close() !!}

    </div>
  </div>

<!-- scripts for tag selector -->
<script src="{{url('js/bower_components/jquery/dist/jquery.js')}}"></script>
<script src="{{url('js/bower_components/jquery-ui/jquery-ui.js')}}"></script>
<script>

$( function() {
  /*
  * este código es copy-paste de la página de jquery-ui
  *
  */
  var availableTags = <?php echo json_encode($offer); ?>;

  function split( val ) {
    return val.split( /,\s*/ );
  }
  function extractLast( term ) {
    return split( term ).pop();
  }

  $( "#tags" )
  // don't navigate away from the field on tab when selecting an item
  .on( "keydown", function( event ) {
    if ( event.keyCode === $.ui.keyCode.TAB &&
      $( this ).autocomplete( "instance" ).menu.active ) {
        event.preventDefault();
      }
    })
    .autocomplete({
      minLength: 0,
      source: function( request, response ) {
        // delegate back to autocomplete, but extract the last term
        response( $.ui.autocomplete.filter(
          availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
    } );
    </script>
    @endsection
