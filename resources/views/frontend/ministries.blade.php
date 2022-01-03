@extends('frontend._layouts.page')

@section('title', 'Spoločenstvá')
{{-- @section('description', 'Popis') --}}
{{-- @section('keywords', 'Slová') --}}

@section('content')

	@include('frontend._sections.banner', ['mainTitle' => 'Spoločenstvá'])

	@include('frontend._sections.ministeriesExtend')

	@include('frontend._sections.skils')

	@include('frontend._sections.pasters')

@endsection
