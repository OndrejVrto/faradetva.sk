@props([
    'lang' => str_replace('_', '-', app()->getLocale()),
    'css_general' => null,
    'js_general' => null,
])
<!-- {{ Request::fullUrl().' ('.now().')' }} -->
<!DOCTYPE html>

<!--[if IE 8]> <html lang="{{ $lang }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ $lang }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="{{ $lang }}">
<!-- <![endif]-->

<head>
    <!-- META PROPERTIES Start -->
    <x-frontend.layout.partials.meta />
    <!-- META PROPERTIES End -->

    <!-- FAVICON Start - realfavicongenerator.net -->
    <x-frontend.layout.partials.icons />
    <!-- FAVICON End - realfavicongenerator.net -->

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
