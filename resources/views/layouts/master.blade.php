<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	@if(!empty($title))
    <title>{{  $title }}</title>
    @else
    	@if ($__env->yieldContent('title'))
		<title>@yield('title') | Empleo Universitario</title>
    	@else
    	<title></title>
    	@endif
    @endif
    @if(!empty($description))
    <meta name="description" content="{{  $description }} ">
    @else
    	@if ($__env->yieldContent('description'))
		<meta name="description" content="@yield('description')">
    	@else
		<meta name="description" content="Empleo Universitario">
    	@endif
    @endif
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- css--->
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Montserrat|Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ url('css/styles.css') }}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ url('img/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ url('img/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/favicon-16x16.png') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>
</head>
<body class="{{ !empty($__env->yieldContent('bodyclass')) ?   $__env->yieldContent('bodyclass')  : "" }}">
	@if($__env->yieldContent('bodyclass') == 'home') 
	<div class="bgd"></div>
	@endif
	<!--header-->
     @include('layouts.header')
	<!--content-->
    @yield('content')

     <!--footer-->
 	 	@include('layouts.footer')

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
