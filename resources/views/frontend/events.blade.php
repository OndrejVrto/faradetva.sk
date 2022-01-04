@extends('frontend._layouts.page')

@section('title', 'Udalosti')
{{-- @section('description', 'Popis') --}}
{{-- @section('keywords', 'Slová') --}}

@section('content')

	@include('frontend._sections.banner', ['mainTitle' => 'Udalosti'])

	@include('frontend._sections.eventExtend')

	@include('frontend._sections.pasters')

	@include('frontend._sections.testimonials')

@endsection
