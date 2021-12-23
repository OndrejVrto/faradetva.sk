@extends('_layouts.app')

@section('title', 'Farnosť Detva')
@section('description', 'Popis')
@section('keywords', 'Slová')

@push('style')
@endpush

@php
	$mainTitle = 'Domov';
	// $scripts = ['js/jquery.js',
	// 			'js/bootstrap.min.js',
	// 			'js/plugins/owl-crousel/owl.carousel.js',
	// 			'js/plugins/animation/wow.min.js',
	// 			'js/plugins/animation/jquery.appear.js',
	// 			'js/plugins/counter/jquery.countTo.js',
	// 			'js/custom.js']
@endphp

@push('scripts')
@endpush

@section('content')

	@include('_partials.slider')

	@include('_partials.about')

	@include('_partials.ministeries')

	@include('_partials.event')

	@include('_partials.pray')

	@include('_partials.skils')

	@include('_partials.testimonials')

	{{-- @include('_partials.pasters') --}}

@endsection
