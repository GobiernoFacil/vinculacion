@extends('layouts.master-admin')
@section('title', 'Actualizar convenio')
@section('description', 'Actualizar convenio de Universidad del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opds update-contratos')

@section('content')
<div class="container">
  <!-- Formulario de company -->
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Actualizar Convenio</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::model("",['url' => "dashboard/convenio/editar/$opd->id/$contract->id", "class" => "form-horizontal"]) !!}

      <!-- cosas de su objeto -->
      <fieldset>
        <h5>Datos del convenio</h5>
        <p>
          <label>Empresa</label>
          {{Form::hidden('company_id',$contract->company_id,["id"=>'company_id',"class" => "form-control"])}}
          {{Form::text('company',$contract->company->nombre_comercial,["id"=>'company',"class" => "form-control"])}}
          @if($errors->has('company_id') && !$errors->has('company') )
          <strong>La empresa no se encuentra en el sistema</strong>
          @endif
          @if($errors->has('company'))
          <strong>{{$errors->first('company')}}</strong>
          @endif
        </p>

        <p>
          <label>Nombre del convenio</label>
          {{Form::text('contract_name',$contract->contract_name,["class" => "form-control"])}}
          @if($errors->has('contract_name'))
          <strong>{{$errors->first('contract_name')}}</strong>
          @endif
        </p>

        <p>
          <label>Objetivo</label>
          {{Form::textarea('contract_objective',$contract->contract_objective,["class" => "form-control"])}}
          @if($errors->has('contract_objective'))
          <strong>{{$errors->first('contract_objective')}}</strong>
          @endif
        </p>

        <p>
          <label>Descripción</label>
          {{Form::textarea('contract_description',$contract->contract_description,["class" => "form-control"])}}
          @if($errors->has('contract_description'))
          <strong>{{$errors->first('contract_description')}}</strong>
          @endif
        </p>

        <p>
          <label>Estudiantes Beneficiados</label>
          {{Form::number('contract_benefit_students',$contract->contract_benefit_students,["class" => "form-control"])}}
          @if($errors->has('contract_benefit_students'))
          <strong>{{$errors->first('contract_benefit_students')}}</strong>
          @endif
        </p>

        <p>
          <label>Docentes Beneficiados</label>
          {{Form::number('contract_benefit_teachers',$contract->contract_benefit_teachers,["class" => "form-control"])}}
          @if($errors->has('contract_benefit_teachers'))
          <strong>{{$errors->first('contract_benefit_teachers')}}</strong>
          @endif
        </p>

        <p>
          <label>Estudiantes Participantes</label>
          {{Form::number('contract_participant_students',$contract->contract_participant_students,["class" => "form-control"])}}
          @if($errors->has('contract_participant_students'))
          <strong>{{$errors->first('contract_participant_students')}}</strong>
          @endif
        </p>

        <p>
          <label>Docentes Participantes</label>
          {{Form::number('contract_participant_teachers',$contract->contract_participant_teachers,["class" => "form-control"])}}
          @if($errors->has('contract_participant_teachers'))
          <strong>{{$errors->first('contract_participant_teachers')}}</strong>
          @endif
        </p>

        <p>
          <label>Presupuesto Federal</label>
          {{Form::text('contract_federal_budget',$contract->contract_federal_budget,["class" => "form-control"])}}
          @if($errors->has('contract_federal_budget'))
          <strong>{{$errors->first('contract_federal_budget')}}</strong>
          @endif
        </p>

        <p>
          <label>Presupuesto Estatal</label>
          {{Form::text('contract_state_budget',$contract->contract_state_budget,["class" => "form-control"])}}
          @if($errors->has('contract_state_budget'))
          <strong>{{$errors->first('contract_state_budget')}}</strong>
          @endif
        </p>
        <p>
          <label>Ingresos Propios</label>
          {{Form::text('contract_own_budget',$contract->contract_own_budget,["class" => "form-control"])}}
          @if($errors->has('contract_own_budget'))
          <strong>{{$errors->first('contract_own_budget')}}</strong>
          @endif
        </p>
        <p>
          <label>Programa de la Fuente de Financiamiento</label>
          {{Form::text('contract_funding_source',$contract->contract_funding_source,["class" => "form-control"])}}
          @if($errors->has('contract_funding_source'))
          <strong>{{$errors->first('contract_funding_source')}}</strong>
          @endif
        </p>
        <p>
          <label>Fecha de firma del convenio</label>
          {{Form::text('contract_signature_date',$contract->contract_signature_date,["class" => "form-control"])}}
          @if($errors->has('contract_signature_date'))
          <strong>{{$errors->first('contract_signature_date')}}</strong>
          @endif
        </p>

        <p>
          <label>Vigencia del convenio</label>
          {{Form::text('contract_expiry_date',$contract->contract_expiry_date,["class" => "form-control"])}}
          @if($errors->has('contract_expiry_date'))
          <strong>{{$errors->first('contract_expiry_date')}}</strong>
          @endif
        </p>

      </fieldset>

      <!-- persona que captura -->
      <fieldset>
        <h5>Datos de la persona que captura</h5>
        <p>
          <label>Nombre</label>
          {{Form::text('contract_responsable_name',$contract->contract_responsable_name,["class" => "form-control"])}}
          @if($errors->has('contract_responsable_name'))
          <strong>{{$errors->first('contract_responsable_name')}}</strong>
          @endif
        </p>
        <p>
          <label>Correo</label>
          {{Form::email('contract_responsable_email',$contract->contract_responsable_email,["class" => "form-control"])}}
          @if($errors->has('contract_responsable_email'))
          <strong>{{$errors->first('contract_responsable_email')}}</strong>
          @endif
        </p>

      </fieldset>

      <p>{{Form::submit('Actualizar',["class" => "btn"])}}</p>

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
  var availableCompanies = <?php echo json_encode($companies); ?>;
  var all                = <?php echo json_encode($all); ?>;

  function split( val ) {
    return val.split( /,\s*/ );
  }
  function extractLast( term ) {
    return split( term ).pop();
  }

      $( "#company" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        $("#company_id").val("");
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
              availableCompanies, extractLast( request.term ) ) );
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
              this.value = terms.join( "" );
              //adds company id to form
              $("#company_id").val(all[this.value]);
              return false;
            }
          });
    } );
    </script>
@endsection
