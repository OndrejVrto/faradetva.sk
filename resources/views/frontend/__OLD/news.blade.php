@extends('frontend._layouts.page')

@section('title', 'Správy')
{{-- @section('description', 'Popis') --}}
{{-- @section('keywords', 'Slová') --}}

@section('content')

    @include('frontend._sections.banner', ['mainTitle' => 'Správy'])

    @include('frontend._sections.news')

@endsection
