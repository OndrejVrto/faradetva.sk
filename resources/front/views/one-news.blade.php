@extends('_layouts.page')

@section('title', 'Správa')
{{-- @section('description', 'Popis') --}}
{{-- @section('keywords', 'Slová') --}}

@section('content')

	@include('_sections.banner', ['mainTitle' => 'Správa'])

	@include('_sections.one-news')

@endsection
