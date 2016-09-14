<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    @if ($__env->yieldContent('title'))
	<title>@yield('title') | Vinculación</title>
    @else
    <title>Empleo Abierto del Estado de Puebla</title>
    @endif

    
    @if ($__env->yieldContent('description'))
	<meta name="description" content="@yield('description')">
    @else
	<meta name="description" content="Empleo Abierto del Estado de Puebla">
    @endif
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- css--->
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Montserrat|Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ url('css/styles.css') }}"/>
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


		<!-- breadcrumb-->

	<!--content-->
    @yield('content')

     <!--footer-->
	@include('layouts.footer')
</body>
</html>
