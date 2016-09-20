@extends('layouts.master-admin')
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
