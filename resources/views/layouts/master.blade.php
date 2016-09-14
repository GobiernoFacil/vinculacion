<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	@if(!empty($title))
    <title>{{  $title }}</title>
    @else
    	@if ($__env->yieldContent('title'))
		<title>@yield('title') | Vinculación</title>
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
		<meta name="description" content="Plataforma Vinculación">
    	@endif
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
</body>
</html>
