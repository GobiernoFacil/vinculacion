@extends('layouts.master-admin')
@section('title', 'Agregar Vacante')
@section('description', 'Agregar nueva vacante en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'company vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'vacante add')

@section('content')
<div class="container">
  <!-- Formulario de vacante -->
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Agregar vacante</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::open(['url' => "tablero-empresa/vacante/crear", "class" => "form-horizontal"]) !!}

      <!-- cosas de su objeto -->
      <fieldset>
        <h5>Datos de la vacante</h5>
        <!-- 
| job             | varchar(255)     | YES  |     | NULL    |       x        |
| tags            | text             | YES  |     | NULL    |       x        |
| age_from        | int(11)          | YES  |     | NULL    |                |
| age_to          | int(11)          | YES  |     | NULL    |                |
| travel          | tinyint(1)       | YES  |     | NULL    |                |
| location        | tinyint(1)       | YES  |     | NULL    |                |
| experience      | text             | YES  |     | NULL    |                |
| salary          | double(8,2)      | YES  |     | NULL    |       x        |
| work_from       | varchar(255)     | YES  |     | NULL    |                |
| work_to         | varchar(255)     | YES  |     | NULL    |                |
| benefits        | varchar(255)     | YES  |     | NULL    |                |
| expenses        | varchar(255)     | YES  |     | NULL    |                |
| training        | varchar(255)     | YES  |     | NULL    |                |
| state           | varchar(255)     | YES  |     | NULL    |                |
| city            | varchar(255)     | YES  |     | NULL    |                |
| salary_min      | double(8,2)      | YES  |     | NULL    |                |
| salary_max      | double(8,2)      | YES  |     | NULL    |                |
| salary_type     | varchar(255)     | YES  |     | NULL    |                |
| salary_variable | int(11)          | YES  |     | NULL    |                |
| salary_extra    | int(11)          | YES  |     | NULL    |                |
| personality     | varchar(255)     | YES  |     | NULL    |                |
| contract_level  | varchar(255)     | YES  |     | NULL    |                |
| contract_type   | varchar(255)     | YES  |     | NULL    |                |
| speciality      | varchar(255)     | YES  |     | NULL    |                |
        -->
        <p>
          <label>vacante</label>
          {{Form::text('job',null,["class" => "form-control"])}}
          @if($errors->has('job'))
          <strong>{{$errors->first('job')}}</strong>
          @endif
        </p>

        <p>
          <label>carreras</label>
          {{Form::text('tags',null,["class" => "form-control", "id" => "tags"])}}
          @if($errors->has('tags'))
          <strong>{{$errors->first('tags')}}</strong>
          @endif
        </p>

        <p>
          <label>salario</label>
          {{Form::text('salary',null,["class" => "form-control"])}}
          @if($errors->has('salary'))
          <strong>{{$errors->first('salary')}}</strong>
          @endif
        </p>
      </fieldset>

      <p>{{Form::submit('Crear',["class" => "btn"])}}</p>

      <!-- se cierra el form -->
      {!! Form::close() !!}

    </div>
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
