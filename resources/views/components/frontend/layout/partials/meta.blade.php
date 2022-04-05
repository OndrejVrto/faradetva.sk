<!-- SEOMeta -->
{!! SEOMeta::generate() !!}

<!-- Manualy added -->
<meta charset="utf-8">
<meta name="MobileOptimized" content="320">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="programmed-in" content="Thanks LARAVEL!">
<meta name="application-author" content="Ing. Ondrej VRŤO, IWE (https://ondrejvrto.eu)">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- OpenGraph -->
{!! OpenGraph::generate() !!}

<!-- Twitter -->
{!! Twitter::generate() !!}

<!-- JSonLd -->
{!! JsonLd::generate() !!}

<!-- JsonLdMulti -->
{!! JsonLdMulti::generate() !!}


<!-- BreadCrumb JsonLd -->
@stack('BreadCrumbJSonLd')