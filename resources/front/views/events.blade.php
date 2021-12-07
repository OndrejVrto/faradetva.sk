@extends('_layouts.app')

@section('title', 'Farnosť Detva - Udalosti')
@section('description', 'Popis')
@section('keywords', 'Slová')

@push('style')
@endpush

@php
	$mainTitle = 'Udalosti';
	// $scripts = ['js/jquery.js',
	// 			'js/bootstrap.min.js',
	// 			'js/plugins/owl-crousel/owl.carousel.js',
	// 			'js/plugins/animation/wow.min.js',
	// 			'js/plugins/animation/jquery.appear.js',
	// 			'js/custom.js']
@endphp

@push('scripts')
@endpush

@section('content')

	@include('_partials.banner')

	@include('_partials.eventExtend')

	@include('_partials.pasters')

	@include('_partials.testimonials')

@endsection
