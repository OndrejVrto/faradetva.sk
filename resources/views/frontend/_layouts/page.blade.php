@extends('frontend._layouts.master')

@section('css_master')
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/font-awesome-5.15.4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom_animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/js//plugins/owl-crousel/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/bootstrap-5.1.3/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/responsive.css') }}">

    {{-- Custom styles --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom.css') }}">

    @stack('css')
    @yield('css')
    {{-- <script src="{{ asset('vendor/debugbar.js') }}"></script> --}}
@stop

@section('js_master')
    <script type="text/javascript" src="{{ asset('asset/frontend/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/frontend/js/bootstrap-5.1.3/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/frontend/js/plugins/owl-crousel/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/frontend/js/plugins/animation/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/frontend/js/plugins/animation/jquery.appear.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/frontend/js/plugins/counter/jquery.countTo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/frontend/js/custom.js') }}"></script>

    {{-- Custom Scripts --}}
    @stack('js')
    @yield('js')
@stop


@section('body')

    {{-- @include('frontend._partials.preload') --}}

    @include('frontend._partials.search')

    @include('frontend._partials.menu')

    <!-- section Content Start -->
    @stack('content_prepend')
    @yield('content')
    @stack('content_append')
    <!-- section Content End -->

    @include('frontend._partials.footer')

@stop
