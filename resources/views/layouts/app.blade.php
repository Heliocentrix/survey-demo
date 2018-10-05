<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">
	<link href="{{ URL::to('stylesheets/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::to('stylesheets/pixel-admin.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::to('stylesheets/themes.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::to('assets/css/animate.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::to('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body class="theme-dust main-navbar-fixed">
        <div id="main-wrapper">
            @include('layouts.partials.side-nav')   
                <div id="content-wrapper">
                    @yield('content')
                </div>
            </div>


    <!-- Scripts -->
    	<!--[if !IE]> -->
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">'+"<"+"/script>"); </script>
	<!-- <![endif]-->
	<!--[if lte IE 9]>
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
	<![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="{{ URL::to('javascripts/bootstrap.min.js') }}"></script>
	<script src="{{ URL::to('javascripts/pixel-admin.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var endpoint = '/wp-json/plugin-name/v1/getupdates';
    </script>
    @yield('script')
</body>
</html>
