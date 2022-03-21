@extends('backend._layouts.app')

@section('title', __('backend-texts.testimonials.title'))
@section('meta_description', __('backend-texts.testimonials.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('testimonials.edit', false, $testimonial, $testimonial->name )}}
@stop

@section('content')
    @include('backend.testimonials.form')
@endsection
