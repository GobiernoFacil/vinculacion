<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    @if ($__env->yieldContent('title'))
	<title>@yield('title') | Empleo Universitario</title>
    @else
    <title>Empleo Universitario del Estado de Puebla</title>
    @endif

    
    @if ($__env->yieldContent('description'))
	<meta name="description" content="@yield('description')">
    @else
	<meta name="description" content="Empleo Universitario del Estado de Puebla">
    @endif
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Montserrat|Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('js/bower_components/jqueryuibootstrap/css/custom-theme/jquery-ui-1.10.3.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('js/bower_components/jqueryuibootstrap/css/custom-theme/jquery-ui-1.10.3.custom.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/styles.css') }}"/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('img/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ url('img/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/favicon-16x16.png') }}">
	
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>

</head>

<body class="admin {{ !empty($__env->yieldContent('bodyclass')) ?   $__env->yieldContent('bodyclass')  : "" }}">
	<!--header-->
	@include('layouts.nav')
	
	@if ($__env->yieldContent('breadcrumb'))
	    <!-- breadcrumb-->
		@include($__env->yieldContent('breadcrumb'))
	@endif
	
	<!--content-->
    <section>
	    <div class="container">
		@yield('content')
	    </div>
    </section>
     <!--footer-->
	@include('layouts.footer')
	<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "main_nav") {
        x.className += " responsive";
    } else {
        x.className = "main_nav";
    }
}
</script>

<script src="{{url('js/bower_components/js-sha256/build/sha256.min.js')}}"></script>
<script>
  var i, sha_forms = document.querySelectorAll("form");

  for(i = 0; i < sha_forms.length; i++){
    sha_forms[i].addEventListener("submit", function(e){
        e.preventDefault();
        
        var j, sha_passwords = this.querySelectorAll("input[type='password']");
        for(j = 0; j < sha_passwords.length; j++){
          sha_passwords[j].value = sha_passwords[j].value.length ? sha256(sha_passwords[j].value) : sha_passwords[j].value;
        }

        this.submit();
    });
  }

</script>
</body>
</html>
