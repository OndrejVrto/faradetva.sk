@extends('frontend._layouts.page')

@section('title', 'O nás')
@section('description', 'Popis')
@section('keywords', 'Slová')

@section('content')

    @include('frontend._sections.banner', ['mainTitle' => 'O nás'])

    @include('frontend._sections.aboutPage')

    @include('frontend._sections.skill')

    @include('frontend._sections.testimonials')

    @include('frontend._sections.pasters')

@endsection

