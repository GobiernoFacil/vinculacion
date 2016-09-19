@extends('layouts.master-admin')
@section('content')

<!-- Admins -->
<h4>Admins</h4>
@if($opds->count())
  <ul>
  @foreach($opds as $opd)
    <li>{{$opd->name}}</li>
  @endforeach
  </ul>

@else
<p>Eres el único administrador</p>
@endif


{{ $opds->links() }}
@endsection
