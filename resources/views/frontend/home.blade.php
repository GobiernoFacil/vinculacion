@extends('layouts.master')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'home')
@section('js-scripts')
<script src="{{ url('js/home/classie.js') }}"></script>
<script src="{{ url('js/home/modalEffects.js') }}"></script>
@endsection

@section('content')

<!--modal login -->
<div class="md-modal md-effect-5" id="modal-3">
	<div class="md-content">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-9 right">
				<a class="btn danger md-close" href="#">x</a>
			</div>
		</div>
		<h3><i class="material-icons">person</i> Iniciar Sesión</h3>
		<div class="row">
			<div class="col-sm-12">
			@include('layouts.forms.login_form')
			</div>
			
		</div>
	</div>
</div>

<!--modal registrar estudiantes-->
<div class="md-modal md-effect-5" id="modal-1">
	<div class="md-content">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-9 right">
				<a class="btn danger md-close" href="#">x</a>
			</div>
		</div>
		<h3><i class="material-icons">person_add</i> Regístrate y encuentra empleo</h3>
		<div class="row">
			<div class="col-sm-12">
			@include('layouts.forms.register_form')
			</div>
			
		</div>
	</div>
</div>
<!--modal registrar empresas-->
<div class="md-modal md-effect-5" id="modal-2">
	<div class="md-content">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-9 right">
				<a class="btn danger md-close" href="#">x</a>
			</div>
		</div>		
		<h3>Registrar Empresa</h3>
		<div class="row">
			<div class="col-sm-12">
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="welcome">
	<div class="row">
		<div class="col-sm-12">
			<h1>Encuentra tu próximo empleo</h1>
		</div>
		<div class="col-sm-8 col-sm-offset-2">
			<p class="lead">Fácil vinculación y acceso a oportunidades laborales a <strong>estudiantes</strong> de las Universidades Politécnicas del Estado de Puebla</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-2">
			<div class="signup">
				<p><strong>1200</strong> vacantes, envía tu CV</p>
				<a class="md-trigger"  data-modal="modal-1">Regístrate</a>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="signup company">
				<p><strong>56</strong> sectores con talento</p>
				<a class="md-trigger"  data-modal="modal-2">Publica vacante</a>
			</div>
		</div>
	</div>
	</div>
	
	<section>
		<div class="row">
			<div class="col-sm-12">
				<h2>Tu próximo trabajo podría estar con una de estas empresas</h2>
				<p>Si estudias o eres egresado de alguna Universidad Politécnica del Estado de Puebla, agrega tu CV.</p>
			</div>
		</div>
		<!--logos-->
		<div class="row">
			<div class="col-sm-3">
				<a href="" class="img_company">
					<img src="{{ url('img/Bimbo_logo.png') }}">
					195 vacantes
				</a>
			</div>
			<div class="col-sm-3">
				<a href="" class="img_company">
					<img src="{{ url('img/gamesa_logo.png') }}">
					646 vacantes
				</a>
			</div>
			<div class="col-sm-3">
				<a href="" class="img_company">
					<img src="{{ url('img/SfMlMquK.jpg') }}">
					18 vacantes
				</a>
			</div>
			<div class="col-sm-3">
				<a href="" class="img_company">
					<img src="{{ url('img/PLSc2CBX_400x400.jpeg') }}">
					237 vacantes
				</a>
			</div>
		</div>
		<!--btn all-->
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<a href="" class="btn">Ver todas las empresas</a>
			</div>
		</div>
	</section>
</div>
<!--opds-->
<section class="opds">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Encuentra un trabajo cerca de tu universidad</h2>
			</div>
			<div class="col-sm-4">
				<ul>
					<li><a href="">Universidad Tecnológica Bilingüe, Internacional y Sustentable del Estado de Puebla </a> </li>
					<li><a href="">Universidad Tecnológica de Huejotzingo											  </a>  </li>
					<li><a href="">Universidad Tecnológica de Izúcar de Matamoros									  </a>  </li>
					<li><a href="">Universidad Tecnológica de Oriental												  </a>  </li>
					<li><a href="">Universidad Tecnológica de Puebla												  </a>  </li>
					<li><a href="">Universidad Tecnológica de Tecamachalco											  </a>  </li>
					<li><a href="">Universidad Tecnológica de Tehuacán												  </a>  </li>
					<li><a href="">Universidad Tecnológica de Xicotepec de Juárez									  </a>  </li>
					<li><a href="">Universidad Politécnica de Amozoc de Mota										  </a>  </li>
					<li><a href="">Universidad Politécnica de Puebla												  </a>  </li>
				</ul>
			</div>
			<div class="col-sm-4">
				<ul>
					<li><a href="">Universidad Politécnica Metropolitana de Puebla			   </a></li>
					<li><a href="">Universidad Intercultural del Estado de Puebla			   </a></li>
					<li><a href="">Universidad Interserrana del Estado de Puebla			   </a></li>
					<li><a href="">Instituto Tecnológico Superior de Acatlán de Osorio		   </a></li>
					<li><a href="">Instituto Tecnológico Superior de Atlixco				   </a></li>
					<li><a href="">Instituto Tecnológico Superior de Ciudad Serdán			   </a></li>
					<li><a href="">Instituto Tecnológico Superior de Huachinango			   </a></li>
					<li><a href="">Instituto Tecnológico Superior de la Sierra Negra de Ajalpan</a></li>
					<li><a href="">Instituto Tecnológico Superior de la Sierra Norte de Puebla </a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<ul>
					<li><a href="">Instituto Tecnológico Superior de Libres				  </a></li>
					<li><a href="">Instituto Tecnológico Superior de San Martín Texmelucan</a></li>
					<li><a href="">Instituto Tecnológico Superior de Tepeaca			  </a></li>
					<li><a href="">Instituto Tecnológico Superior de Tepexi de Rodriguez  </a></li>
					<li><a href="">Instituto Tecnológico Superior de Teziutlán			  </a></li>
					<li><a href="">Instituto Tecnológico Superior de Tlatlauquitepec	  </a></li>
					<li><a href="">Instituto Tecnológico Superior de Venustiano Carranza  </a></li>
					<li><a href="">Instituto Tecnológico Superior de Zacapoaxtla		  </a></li>

				</ul>
			</div>
		</div>
	</div>
</section>
<div class="md-overlay"></div><!-- the overlay element -->

@endsection