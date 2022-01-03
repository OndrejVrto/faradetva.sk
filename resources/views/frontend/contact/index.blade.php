@extends('frontend._layouts.page')

@section('title', 'Kontakty')
@section('description', 'Popis')
@section('keywords', 'Slová')

@section('content')

	@include('frontend._sections.banner', ['mainTitle' => 'Kontakt'])

	@include('frontend._sections.contact')

	@include('frontend._sections.map')

	@include('frontend._sections.pasters')

@endsection
