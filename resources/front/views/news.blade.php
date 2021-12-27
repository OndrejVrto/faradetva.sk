@extends('_layouts.page')

@section('title', 'Správy')
{{-- @section('description', 'Popis') --}}
{{-- @section('keywords', 'Slová') --}}

@section('content')

	@include('_sections.banner', ['mainTitle' => 'Správy'])

	@include('_sections.news')

@endsection
