<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h1>Oderta académica</h1>

@if($offers)
  <table>
    <thead>
      <tr>
        <th>carrera</th>
        <th>universidad</th>
        <th>ciudad</th>
        <th>acciones</th>
      </tr>
    </thead>
    <tbody>
    @foreach($offers as $offer)
      <tr>
        <td>{{$offer->academic_name}}</td>
        <td>{{$offer->opd}}</td>
        <td>{{$offer->city}}</td>
        <td><a href="{{url("dashboard/oferta-academica/editar/{$offer->id}")}}">editar</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
@else
<p>No has registrado ninguna oferta académica</p>
@endif

{{ $offers->links() }}
</body>
</html>