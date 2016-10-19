@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company me')

@section('content')
@if(!$user->enabled)
 @include('companies.alert-message')
@endif
@endsection
