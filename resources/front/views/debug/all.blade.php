@extends('_layouts.page')

@section('title', 'DEBUG')
@section('description', 'Stránka slúži výhradne pre vývoj Frontedovej časti')
@section('keywords', 'DEBUG')

@section('content')

	@include('_sections.banner', ['mainTitle' => 'DEBUG'])

	@include('_sections.testimonials')

	@include('_sections.pasters')

	@include('_sections.contact')

	@include('_sections.map')


	@include('_sections.about')
	@include('_sections.aboutPage')

	@include('_sections.skill')

	@include('_sections.event')
	@include('_sections.eventExtend')

	@include('_sections.slider')

	@include('_sections.event')

	@include('_sections.pray')

	@include('_sections.ministeries')
	@include('_sections.ministeriesExtend')


	@include('_sections.news')
	@include('_sections.one-news')

@endsection
