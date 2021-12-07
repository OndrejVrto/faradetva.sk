@extends('_layouts.app')

@section('title', 'Farnosť Detva - Spoločenstvá')
@section('description', 'Popis')
@section('keywords', 'Slová')

@push('style')
@endpush

@php
	$mainTitle = 'Spoločenstvá';
	// $scripts = ['js/jquery.js',
	// 			'js/bootstrap.min.js',
	// 			'js/plugins/animation/wow.min.js',
	// 			'js/plugins/animation/jquery.appear.js',
	// 			'js/plugins/counter/jquery.countTo.js',
	// 			'js/custom.js']
@endphp

@push('scripts')
@endpush

@section('content')

	@include('_partials.banner')

	@include('_partials.ministeriesExtend')

	@include('_partials.skils')

	@include('_partials.pasters')

@endsection
