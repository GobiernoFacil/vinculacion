@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company me')

@section('content')
@if(!$user->enabled)
<p>Para que tu información forme parte del sitio, y puedas publicar vacantes, un tecnológico debe autorizar tu registro. Si este procedimiento tarda, puedes contactarlos directamente, buscando su información en el directorio de <strong><a target="_blank" href = "{{url('tablero-empresas/universidades')}}">universidades</a></strong>.</p>
@endif
@endsection
