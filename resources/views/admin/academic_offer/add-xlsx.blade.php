<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h1>Cargar oferta académica</h1>
{!! Form::open(['url' => 'dashboard/oferta-academica/actualizar/xlsx', 'files' => true]) !!}
  <h3>Selecciona el archivo de excel para cargar la oferta académica</h3>
    {!! csrf_field() !!}
    <p class="lead">
    {{Form::file('file')}} <br>
    (El archivo debe ser excel menor a 5mb)
    </p>
    @if($errors->has('file'))
      <strong>{{$errors->first('file')}}</strong>
    @endif

    <p><input type="submit" name="Enviar" class ="btn" value="Agregar oferta"></p>
  {!! Form::close() !!}
</body>
</html>