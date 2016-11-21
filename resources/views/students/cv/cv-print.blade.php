<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>CV</title>
	<style>
		* {
			font-family: sans-serif;
		}
		h2 { 
			width: 50%;
			float:left;
		}
		
		h3 {
			border-top: 1px solid #f2f2f2;
			margin: 20px 0 0;
			padding: 10px 0 0;
		}
		.list_info { 
			color: #555;
			margin: 0;
			font-size: 9pt;
			
		}
		.right {text-align: right;}	
		.list_info.right { 
			float:right;
			list-style: none;
			margin-bottom: 20px;
			width: 50%;
		}
		.note { color: #999;
			font-size: 10pt;
		}
		.name { display: block;}
		.clearfix { clear: both; }
	</style>
</head>
<body>
  <h2>{{ucwords(strtolower($student->nombre . ' ' . $student->apellido_paterno))}}</h2>
  
  <ul class="list_info right">
	<li><strong>Género</strong>: {{$cv->gender == 0 ? "Masculino" : "Femenino"}}</li>
	<li><strong>Email</strong>: {{$cv->email  ? $cv->email : "Sin información de correo"}}</li>
	<li><strong>Edad</strong>: {{$cv->age ? $cv->age . " años" : "Sin información de edad"}}</li>
	<li><strong>Teléfono</strong>: {{$cv->phone ? $cv->phone : "Sin información "}}</li>
	<li><strong>Celular</strong>: {{$cv->mobile ? $cv->mobile : "Sin información "}}</li>
	<li><strong>Lugar de residencia</strong>: {{$cv->city ? $cv->city . '. ': ""}} {{$cv->state ? $cv->state . '. ' : ""}} {{$cv->country ? $cv->country . '. ' : ""}}</li>
	<li><strong>Actualizado</strong>: {{date('d-m-Y', strtotime($cv->updated_at))}}</li>
  </ul>
  <div class="clearfix"></div>
  <h3>Experiencia laboral</h3>
  	<ul>
  	@foreach($cv->experiences as $experience)
  	<li>
  		<strong>{{$experience->company}}</strong>
  		<span class="note">({{$experience->from}} a {{$experience->to}})</span>
  		<span class="name">{{$experience->name}}</span>
  		<ul class="list_info">
  			<li><strong>Sector</strong>: {{$experience->sector}}</li>
  			<li><strong>Descripción del puesto</strong>: {{$experience->description}}</li>
  			<li><strong>Ubicación</strong>: {{$experience->city ? $experience->city . '. ' : ''}} {{$experience->state}}</li>
  		</ul>
  	</li>
  	@endforeach
  	</ul>
		
	
	<h3>Experiencia académica</h3>
	<ul>
      @foreach($cv->academic_trainings as $study)
		<li>
			<strong>{{$study->institution}}</strong>
			<span class="note">({{$study->from}} a {{$study->to}})</span>
			<span class="name">{{$study->name}}</span>
			<ul class="list_info">
				<li><strong>Ubicación</strong>: {{$study->city ? $study->city . '. ' : ''}} {{$study->state}}</li>
			</ul>
		</li>
		@endforeach
	</ul>
			
			
    <h3>Idiomas</h3>
	<ul class="list_perks">
		@foreach($cv->languages as $language)
		<li><strong>{{$language->name}}</strong>: {{$language->level}}</li>
		@endforeach
	</ul>
    
    <h3>Software</h3>
	<ul class="list_perks">
      @foreach($cv->softwares as $software)
      <li><strong>{{$software->name}}</strong> : {{$software->level}}</li>
      @endforeach
    </ul>

</body>
</html>