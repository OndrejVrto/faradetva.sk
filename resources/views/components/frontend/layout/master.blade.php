@props(['pageData' => null])
@section('title', $pageData['title'] ?? null)
@section('description', $pageData['description'] ?? null)
@section('keywords', $pageData['keywords'] ?? null)
@section('author', $pageData['author'] ?? null)

<x-frontend.layout.general>

    <x-frontend.sections.preload />

    <x-frontend.sections.menu />

    <!-- MASTER CONTENT Start -->
    <main>
        {{ $slot }}
    </main>
    <!-- MASTER CONTENT End -->

    <x-frontend.sections.footer />

    <x-frontend.sections.search-global />

    <x-slot name="css_general">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/font-awesome-5.15.4.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom_animation.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/flaticon.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/bootstrap-5.1.3/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/js//plugins/owl-crousel/owl.carousel.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom.css') }}">
    </x-slot>

    <x-slot name="js_general">
        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/jquery.js') }}"></script>
        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/bootstrap-5.1.3/bootstrap.js') }}"></script>
        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/owl-crousel/owl.carousel.js') }}"></script>
        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/animation/wow.min.js') }}"></script>
        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/animation/jquery.appear.js') }}"></script>
        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/counter/jquery.countTo.js') }}"></script>
        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/custom.js') }}"></script>
    </x-slot>

</x-frontend.layout.general>
