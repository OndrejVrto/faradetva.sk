@extends('_layouts.page')

@section('title_prefix', '')
@section('title', 'Farnosť Detva')
@section('title_postfix', '| Hlavná stránka')
{{-- @section('description', 'Popis') --}}
{{-- @section('keywords', 'Slová') --}}

@section('content')

	@include('_sections.slider')

	@include('_sections.about')

	@include('_sections.ministeries')

	@include('_sections.event')

	@include('_sections.pray')

	@include('_sections.skils')

	@include('_sections.testimonials')

	@include('_sections.pasters')

@endsection
