@extends('_layouts.blank')

{{-- @section('title', 'Farnosť Detva')
@section('description', 'Popis')
@section('keywords', 'Slová') --}}

@push('style')
	<link href="{{ mix('css/main.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('contentBlank')

	@include('_partials.preload')
	{{-- @include('_partials.search') --}}
	@include('_partials.menu')

<!-- section Content Start -->
	@yield('content')
<!-- section Content End -->

	@include('_partials.footer')

@isset($scripts)
@foreach ($scripts as $script )
	<script type="text/javascript" src="{{ URL::asset($script) }}"></script>
@endforeach
@endisset
@endsection
