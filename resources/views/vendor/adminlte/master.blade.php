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

        <link @nonce rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css', true) }}">

    @else
        <link @nonce rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
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
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico', true) }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png', true) }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-touch-icon-57x57.png', true) }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-touch-icon-60x60x.png', true) }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-touch-icon-72x72.png', true) }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-touch-icon-76x76x.png', true) }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-touch-icon-114x114.png', true) }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-touch-icon-120x120.png', true) }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-touch-icon-144x144.png', true) }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-touch-icon-152x152.png', true) }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon-180x180.png', true) }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png', true) }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png', true) }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-chrome-192x192.png', true) }}">
        <link rel="icon" type="image/png" sizes="256x256"  href="{{ asset('favicons/android-chrome-256x256.png', true) }}">
        <link rel="manifest" href="{{ asset('favicons/site.webmanifest', true) }}">
        <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg', true) }}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/mstile-144x144.png', true) }}">
        <meta name="msapplication-config" content="{{ asset('favicons/browserconfig.xml', true) }}">
        <meta name="theme-color" content="#e3b359">
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

        <script @nonce type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js', true) }}"></script>
    @else
        <script @nonce src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
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
