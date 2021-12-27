<!DOCTYPE html>

@php
    $lang = str_replace('_', '-', app()->getLocale());
@endphp
<!--[if IE 8]> <html lang="{{ $lang }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ $lang }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="{{ $lang }}">
<!-- <![endif]-->

<head>

	{{-- Title --}}
	<title>
		@yield('title_prefix', config('farnost-detva.title_prefix', ''))
		@yield('title', config('farnost-detva.title', 'Farnosť Detva'))
		@yield('title_postfix', config('farnost-detva.title_postfix', ''))
	</title>

	<meta name="description" content="@yield('description', config('farnost-detva.description', 'Webové stránky farnosťi Detva.') ) ">
	<meta name="keywords" content="@yield('keywords', config('farnost-detva.keywords', 'farnosť, Detva, svadba, krst, oznamy, predmanželská príprava, pohreb') ) ">

	<meta name="author" content="Ing. Ondrej VRŤO, IWE">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="MobileOptimized" content="320">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- Custom Meta Tags --}}
	@yield('meta_tags')

	<!-- favicon-icon - realfavicongenerator.net-->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('favicons/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicons/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicons/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ URL::asset('favicons/site.webmanifest') }}">
	<link rel="mask-icon" href="{{ URL::asset('favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
	<link rel="shortcut icon" href="{{ URL::asset('favicons/favicon.ico') }}">
	<meta name="msapplication-TileColor" content="#ffc40d">
	<meta name="msapplication-config" content="{{ URL::asset('favicons/browserconfig.xml') }}">
	<meta name="theme-color" content="#ffffff">
	<!-- favicon-icon -->

	<!-- Style Start -->
    {{-- Custom stylesheets - prepend --}}
    @yield('css_master_prepend')

	@stack('css_master')
</head>

<body class="{{ Request::segment(1) ?: 'home' }}">

    {{-- Body Content --}}
    @yield('body')


	<!-- Scripts - Start-->
	@stack('js_master')
</body>
</html>
