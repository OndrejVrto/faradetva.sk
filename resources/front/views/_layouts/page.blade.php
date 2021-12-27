@extends('_layouts.master')

@section('css_master')
	{{-- <link href="{{ mix('asset/css/main.css') }}" rel="stylesheet" type="text/css"> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/font-awesome.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/custom_animation.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/flaticon.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap-5.0.2/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/special.css') }}">

	{{-- Custom styles --}}
	@stack('css')

	@yield('css')
	{{-- <script src="{{ asset('vendor/debugbar.js') }}"></script> --}}
@stop

@section('js_master')
	{{-- <script src="{{ mix('asset/js/main.js') }}" defer></script> --}}

	{{-- Custom Scripts --}}
    @stack('js')
    @yield('js')
@stop


@section('body')

	@include('_partials.preload')

	@include('_partials.search')

	@include('_partials.menu')

	<!-- section Content Start -->
	@yield('content')
	<!-- section Content End -->

	@include('_partials.footer')

@stop
