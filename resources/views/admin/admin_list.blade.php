@extends('layouts.master-admin')
@section('content')

<!-- Admins -->
<h4>Admins</h4>
@if($admins->count())
  <ul>
  @foreach($admins as $admin)
    <li>{{$admin->name}}</li>
  @endforeach
  </ul>

@else
<p>Eres el único administrador</p>
@endif


{{ $admins->links() }}
@endsection
