@extends('_layouts.app')

@section('title', 'Správa | Farnosť Detva')
@section('description', 'Popis')
@section('keywords', 'Slová')

@push('style')
@endpush

@php
	$mainTitle = 'Jedna správa';
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

	@include('_partials.one-news')

@endsection
