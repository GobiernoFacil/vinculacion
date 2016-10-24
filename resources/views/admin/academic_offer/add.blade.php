<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <h1>crear oferta académica</h1>
  {!! Form::open(["url" => "dashboard/oferta-academica/crear"]) !!}
  <p>carrera: {{Form::text("academic_name")}}</p>
  <p>universidad: {{Form::select("opd", $opds)}}</p>
  <p><input type="submit" value="crear"></p>
  {!! Form::close() !!}
</body>
</html>