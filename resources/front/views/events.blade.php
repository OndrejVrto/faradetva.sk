@extends('_layouts.page')

@section('title', 'Udalosti')
{{-- @section('description', 'Popis') --}}
{{-- @section('keywords', 'Slová') --}}

@section('content')

	@include('_sections.banner', ['mainTitle' => 'Udalosti'])

	@include('_sections.eventExtend')

	@include('_sections.pasters')

	@include('_sections.testimonials')

@endsection
