@extends('_layouts.app')

@section('title', 'Farnosť Detva - Kontakt')
@section('description', 'Popis')
@section('keywords', 'Slová')

@push('style')
@endpush

@php
	$mainTitle = 'Kontakt';
	// $scripts = ['asset/js/jquery.js',
	// 			'asset/js/bootstrap.min.js',
	// 			'asset/js/plugins/animation/wow.min.js',
	// 			'asset/js/custom.js']
@endphp

@section('content')

	@include('_partials.pasters')

	@include('_partials.banner')

	@include('_partials.contact')

	@include('_partials.map')


@endsection
