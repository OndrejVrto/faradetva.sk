@extends('_layouts.page')

@section('title', 'Spoločenstvá')
{{-- @section('description', 'Popis') --}}
{{-- @section('keywords', 'Slová') --}}

@section('content')

	@include('_sections.banner', ['mainTitle' => 'Spoločenstvá'])

	@include('_sections.ministeriesExtend')

	@include('_sections.skils')

	@include('_sections.pasters')

@endsection
