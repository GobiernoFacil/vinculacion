@extends('layouts.master-admin')
@section('title', 'Lista de Universidades')
@section('description', 'Lista de Universidade del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opds')

@section('content')

<!-- Universidades -->
<h4>Universidades</h4>
@if($opds->count())
  <ul>
  @foreach($opds as $opd)
    <li>{{$opd->opd->opd_name}}</li>
    <li><a href="{{url("dashboard/opd/{$opd->id}")}}"> {{$opd->name}}</a></li>
  @endforeach
  </ul>

@else
<p>Eres el único administrador</p>
@endif


{{ $opds->links() }}
@endsection
