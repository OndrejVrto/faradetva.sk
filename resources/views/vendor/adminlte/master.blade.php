<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Title --}}
    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 3'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>
    <meta name="description" content="@yield('meta_description', config('farnost-detva.description', 'Administrácia - Webové stránky farnosťi Detva.'))">

    <!-- Base Meta Tags -->
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow, nosnippet, noarchive, nocache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ Request::fullUrl() }}" />
    <!-- Custom Meta Tags -->
    @stack('meta_tags')

    <!--  Custom stylesheets (pre AdminLTE) -->
    @yield('adminlte_css_pre')
    <!--  Custom stylesheets (pre AdminLTE) End-->

    <!--  Base Stylesheets -->
    @if(!config('adminlte.enabled_laravel_mix'))
        {{-- <link @nonce rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}
        @googlefonts('admin')

        {{-- <link @nonce rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css', true) }}"> --}}
        {{-- <link @nonce rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        <link @nonce rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

        {{-- <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css', true) }}"> --}}
        <link @nonce rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css" />

        {{-- Configured Stylesheets --}}
        @include('adminlte::plugins', ['type' => 'css'])

        {{-- <link @nonce rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css', true) }}"> --}}
        <link @nonce rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer"  href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css"/>

    @else
        <link @nonce rel="stylesheet" href="{{ asset(mix(config('adminlte.laravel_mix_css_path', 'css/app.css')), true) }}">
    @endif

    {{-- Livewire Styles --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireStyles(['nonce' => csp_nonce()])
        @else
            <livewire:styles />
        @endif
    @endif
    <!--  Base Stylesheets End-->

    <!-- Custom Stylesheets (post AdminLTE) -->
    @yield('adminlte_css')
    <!-- Custom Stylesheets (post AdminLTE) End -->

    <!-- Favicon -->
    @if(config('adminlte.use_ico_only'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico', true) }}" />
    @elseif(config('adminlte.use_full_favicon'))
        <!-- FAVICON Start - realfavicongenerator.net -->
        <x-frontend.layout.partials.icons />
        <!-- FAVICON End - realfavicongenerator.net -->
    @endif
    <!-- Favicon End-->

</head>

<body class="@yield('classes_body')" @yield('body_data')>

    <!-- Body Content -->
    @yield('body')

    <!-- Base Scripts -->
    @if(!config('adminlte.enabled_laravel_mix'))
        {{-- <script @nonce src="{{ asset('vendor/jquery/jquery.min.js', true) }}"></script> --}}
        <script @nonce type="text/javascript" crossorigin="anonymous" referrerpolicy="no-referrer" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        {{-- <script @nonce src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js', true) }}"></script> --}}
        <script @nonce type="text/javascript" crossorigin="anonymous" referrerpolicy="no-referrer" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>

        {{-- <script @nonce src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js', true) }}"></script> --}}
        <script @nonce type="text/javascript" crossorigin="anonymous" referrerpolicy="no-referrer" src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js"></script>

        {{-- Configured Scripts --}}
        @include('adminlte::plugins', ['type' => 'js'])

        {{-- <script @nonce type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js', true) }}"></script> --}}
        <script @nonce type="text/javascript" crossorigin="anonymous" referrerpolicy="no-referrer" src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
    @else
        <script @nonce src="{{ asset(mix(config('adminlte.laravel_mix_js_path', 'js/app.js')), true) }}"></script>
    @endif

    {{-- Livewire Script --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireScripts(['nonce' => csp_nonce()])
        @else
            <livewire:scripts />
        @endif
    @endif
    <!-- Base Scripts End-->

    <!-- Custom Scripts -->
    @yield('adminlte_js')
    <!-- Custom Scripts End-->

</body>

</html>
