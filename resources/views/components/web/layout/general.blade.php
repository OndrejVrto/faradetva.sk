@props([
'css_general' => null,
'js_general' => null,
])
<!-- {{ Request::fullUrl().' ('.now().')' }} -->
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- META PROPERTIES Start -->
    <x-web.layout.partials.meta />
    <!-- META PROPERTIES End -->

    <!-- FAVICON Start - realfavicongenerator.net -->
    <x-web.layout.partials.icons />
    <!-- FAVICON End - realfavicongenerator.net -->

    <!-- GENERAL STYLE Start -->
    {{ $css_general }}
    <!-- GENERAL STYLE End -->

    <!-- CUSTOM STYLE Start -->
    @stack('css')
    <!-- CUSTOM STYLE End -->

    <!-- Google tag -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V9524MSX31"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-V9524MSX31');
    </script>
</head>

<body>
    <!-- BODY CONTENT Start -->
    @stack('content_prepend')
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