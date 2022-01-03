@extends('frontend._layouts.page')

@section('title_prefix', '')
@section('title', 'Farnosť Detva')
@section('title_postfix', '| Hlavná stránka')
{{-- @section('description', 'Popis') --}}
{{-- @section('keywords', 'Slová') --}}

@section('content')

	@include('frontend._sections.slider')

	@include('frontend._sections.about')

	@include('frontend._sections.ministeries')

	@include('frontend._sections.event')

	@include('frontend._sections.pray')

	@include('frontend._sections.skils')

	@include('frontend._sections.testimonials')

	@include('frontend._sections.pasters')

@endsection
