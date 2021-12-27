@extends('_layouts.page')

@section('title', 'O nás')
@section('description', 'Popis')
@section('keywords', 'Slová')

@section('content')

	@include('_sections.banner', ['mainTitle' => 'O nás'])

	@include('_sections.aboutPage')

	@include('_sections.skill')

	@include('_sections.testimonials')

	@include('_sections.pasters')

@endsection

