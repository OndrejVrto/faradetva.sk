@extends('frontend._layouts.page')

@section('title', 'All')
@section('description', 'Stránka slúži výhradne pre vývoj Frontedovej časti')
@section('keywords', 'DEBUG')

@section('content')

    @include('frontend._sections.banner', ['mainTitle' => 'DEBUG'])
    @include('frontend._sections.testimonials')
    @include('frontend._sections.pasters')
    @include('frontend._sections.about')
    @include('frontend._sections.aboutPage')
    @include('frontend._sections.contact')
    {{-- @include('frontend._sections.map') --}}
    @include('frontend._sections.skill')
    {{-- @include('frontend._sections.eventExtend') --}}
    {{-- @include('frontend._sections.event') --}}
    {{-- @include('frontend._sections.ministeries') --}}
    {{-- @include('frontend._sections.news-sidebar') --}}
    @include('frontend._sections.ministeriesExtend')
    @include('frontend._sections.slider')
    @include('frontend._sections.news')
    @include('frontend._sections.pray')
    @include('frontend._sections.news-single')

@endsection
