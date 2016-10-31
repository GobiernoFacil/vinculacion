@extends('layouts.master-admin')
@section('title', 'Actualizar Empresa')
@section('description', 'Actualizar nueva empresa en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'chamber empresas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'empresa actualizar')

@section('content')
<div class="container">
  <!-- Formulario de company -->
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Editar Empresa</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::model($element->company->company, ['url' => "tablero-camara/empresa/editar/{$element->company->id}", "class" => "form-horizontal"]) !!}

      <!-- cosas de su objeto -->
      <fieldset>
        <h5>Datos de la empresa</h5>
        <p>
          <label>R.F.C.</label>
          {{Form::text('rfc',$element->company->rfc,["class" => "form-control"])}}
          @if($errors->has('rfc'))
          <strong>{{$errors->first('rfc')}}</strong>
          @endif
        </p>

        <p>
          <label>Razón Social</label>
          {{Form::text('razon_social',$element->company->razon_social,["class" => "form-control"])}}
          @if($errors->has('razon_social'))
          <strong>{{$errors->first('razon_social')}}</strong>
          @endif
        </p>

        <p>
          <label>Nombre Comercial</label>
          {{Form::text('nombre_comercial',$element->company->nombre_comercial,["class" => "form-control"])}}
          @if($errors->has('nombre_comercial'))
          <strong>{{$errors->first('nombre_comercial')}}</strong>
          @endif
        </p>

        <p>
          <label>Dirección</label>
          {{Form::text('address',$element->company->address,["class" => "form-control"])}}
          @if($errors->has('address'))
          <strong>{{$errors->first('address')}}</strong>
          @endif
        </p>

        <p>
          <label>C.P.</label>
          {{Form::text('zip',$element->company->zip,["class" => "form-control"])}}
          @if($errors->has('zip'))
          <strong>{{$errors->first('zip')}}</strong>
          @endif
        </p>

        <p>
          <label>Teléfono</label>
          {{Form::text('phone', $element->company->phone,["class" => "form-control"])}}
          @if($errors->has('phone'))
          <strong>{{$errors->first('cphone')}}</strong>
          @endif
        </p>
        <p>
          <label>Giro Comercial</label>
          {{Form::text('giro_comercial', $element->company->giro_comercial,["class" => "form-control"])}}
          @if($errors->has('giro_comercial'))
          <strong>{{$errors->first('giro_comercial')}}</strong>
          @endif
        </p>
        <p>
          <label>Alcance</label>
          {{Form::text('alcance', $element->company->alcance,["class" => "form-control"])}}
          @if($errors->has('alcance'))
          <strong>{{$errors->first('alcance')}}</strong>
          @endif
        </p>
        <p>
          <label>Tamaño</label>
          {{Form::text('size', $element->company->size,["class" => "form-control"])}}
          @if($errors->has('size'))
          <strong>{{$errors->first('size')}}</strong>
          @endif
        </p>
        <p>
          <label>Tipo</label>
          {{Form::text('type', $element->company->type,["class" => "form-control"])}}
          @if($errors->has('type'))
          <strong>{{$errors->first('type')}}</strong>
          @endif
        </p>
      </fieldset>

      <!-- cosas del contacto -->
      <fieldset>
        <h5>Datos del contacto</h5>
        <p>
          <label>Nombre</label>
          {{Form::text('cname', !empty($element->company->contact->name) ? $element->company->contact->name : "", ['class' => 'form-control'])}}
          @if($errors->has('cname'))
          <strong>{{$errors->first('cname')}}</strong>
          @endif
        </p>
        <p>
          <label>Teléfono</label>
          {{Form::text('cphone', !empty($element->company->contact->phone) ? $element->company->contact->phone : "", ['class' => 'form-control'])}}
          @if($errors->has('cphone'))
          <strong>{{$errors->first('cphone')}}</strong>
          @endif
        </p>

        <p>
          <label>Correo</label>
          {{Form::text('cemail', !empty($element->company->contact->email) ? $element->company->contact->email : "", ['class' => 'form-control'])}}
          @if($errors->has('cemail'))
          <strong>{{$errors->first('cemail')}}</strong>
          @endif
        </p>
      </fieldset>

      <p>{{Form::submit('Actualizar',['class' => 'btn'])}}</p>

      <!-- se cierra el form -->
      {!! Form::close() !!}

    </div>
  </div>
</div>
@endsection
