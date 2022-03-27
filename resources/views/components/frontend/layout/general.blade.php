@props([
    'css_general' => null,
    'js_general' => null,
])
@php($lang = str_replace('_', '-', app()->getLocale()))
<!-- {{ Request::fullUrl() }} -->

<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ $lang }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ $lang }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="{{ $lang }}">
<!-- <![endif]-->

<head>
    <!-- META properties Start -->
    <title>
        @yield('title', config('farnost-detva.title', 'Farnosť Detva'))
        @yield('title_postfix', config('farnost-detva.title_postfix', ''))
    </title>
    <meta name="description" content="@yield('description', config('farnost-detva.description', 'Webové stránky farnosťi Detva.'))">
    <meta name="keywords" content="@yield('keywords', config('farnost-detva.keywords', 'farnosť, Detva, svadba, krst, oznamy, predmanželská príprava, pohreb'))">
    <meta name="author" content="@yield('author', 'Ing. Ondrej VRŤO, IWE')">
    <meta name="author-aplication" content="Ing. Ondrej VRŤO, IWE">
    <meta name="robots" content="index, follow">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="MobileOptimized" content="320">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ Request::fullUrl() }}" />
    <!-- META properties End -->
    <!-- FAVICON - realfavicongenerator.net Start-->
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-touch-icon-60x60x.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-touch-icon-76x76x.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="256x256"  href="{{ asset('favicons/android-chrome-256x256.png') }}">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}" crossorigin="use-credentials">
    <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/mstile-144x144.png') }}">
    <meta name="msapplication-config" content="{{ asset('favicons/browserconfig.xml') }}">
    <meta name="theme-color" content="#e3b359">
    <!-- FAVICON - realfavicongenerator.net End-->

    <!-- GENERAL STYLE Start -->
    {{ $css_general }}
    <!-- GENERAL STYLE End -->
    <!-- CUSTOM STYLE Start -->
    @stack('css')
    <!-- CUSTOM STYLE End -->
</head>

<body>
    <!-- BODY CONTENT Start -->
    {{ $slot }}
    @stack('content_footer')
    <!-- BODY CONTENT End -->
    <!-- GENERAL SCRIPTS Start -->
    {{ $js_general }}
    <!-- GENERAL SCRIPTS End -->
    <!-- CUSTOM SCRIPTS Start -->
    @stack('js')
    <!-- CUSTOM SCRIPTS End -->
</body>
</html>
