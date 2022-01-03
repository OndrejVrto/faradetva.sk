@extends('frontend._layouts.page')

@section('title', 'Správa')
{{-- @section('description', 'Popis') --}}
{{-- @section('keywords', 'Slová') --}}

@section('content')

	@include('frontend._sections.banner', ['mainTitle' => 'Správa'])

	@include('frontend._sections.one-news')

@endsection
