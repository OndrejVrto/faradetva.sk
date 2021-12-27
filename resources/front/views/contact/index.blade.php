@extends('_layouts.page')

@section('title', 'Kontakty')
@section('description', 'Popis')
@section('keywords', 'Slová')

@section('content')

	@include('_sections.banner', ['mainTitle' => 'Kontakt'])

	@include('_sections.contact')

	@include('_sections.map')

	@include('_sections.pasters')

@endsection
