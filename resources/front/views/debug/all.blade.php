@extends('_layouts.app')

@section('title', 'DEBUG - ALL')
@section('description', 'Popis')
@section('keywords', 'Slová')

@push('style')
@endpush

@php
	$mainTitle = 'Kontakt';
@endphp

@section('content')

	@include('_partials.testimonials')

	@include('_partials.pasters')

	@include('_partials.banner')

	@include('_partials.contact')

	@include('_partials.map')


	@include('_partials.about')
	@include('_partials.aboutPage')

	@include('_partials.skils')

	@include('_partials.event')
	@include('_partials.eventExtend')

	@include('_partials.slider')

	@include('_partials.event')

	@include('_partials.pray')

	@include('_partials.ministeries')
	@include('_partials.ministeriesExtend')


	@include('_partials.news')
	@include('_partials.one-news')

@endsection
