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

	<title>@yield('title', 'Farnosť Detva')</title>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="description" content="@yield('description', 'Webové stránky farnosťi Detva.')">
	<meta name="keywords" content="@yield('keywords', 'farnosť, Detva, svadba, krst, oznamy, kňaz, predmanželská príprava, pohreb')">
	<meta name="author" content="Ing. Ondrej VRŤO, IWE">
	<meta name="MobileOptimized" content="320">
	<meta name="csrf-token" content="{{ csrf_token() }}">

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

	<!--srart theme style -->
	@yield('third_party_stylesheets')

	@stack('style')

</head>

<body class="{{ Request::segment(1) ?: 'home' }}">
@yield('contentBlank')

<script src="{{ mix('asset/js/main.js') }}" defer></script>
@yield('third_party_scripts')

@stack('scripts')
</body>
</html>
