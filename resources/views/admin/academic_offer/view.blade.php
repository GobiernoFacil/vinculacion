<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <h1>{{$offer->academic_name}}</h1>
  <p>{{$offer->opd}}</p>
  <p>{{$offer->city}}</p>
  <p><a href="{{url("dashboard/oferta-academica/editar/{$offer->id}")}}">editar</a></p>
</body>
</html>