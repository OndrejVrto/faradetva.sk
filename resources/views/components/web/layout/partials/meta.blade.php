<!-- SEOMeta -->
{!! SEOMeta::generate() !!}

<!-- Manualy -->
<base href="{{ config('app.url') }}">
<meta charset="utf-8">
<meta name="MobileOptimized" content="320">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="programmed-in" content="Thanks LARAVEL!">
<meta name="application-author" content="Ing. Ondrej VRŤO, IWE (https://ondrejvrto.eu)">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="sitemap" type="application/xml" title="Sitemap" href="{{ config('app.url') }}/sitemap.xml">

<!-- OpenGraph -->
{!! OpenGraph::generate() !!}

<!-- Twitter -->
{!! Twitter::generate() !!}

<!-- Schema markup -->
<x-web.seo-json-ld />
