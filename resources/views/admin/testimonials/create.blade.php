@extends('admin._layouts.app')

@section('title', __('backend-texts.testimonials.title'))
@section('meta_description', __('backend-texts.testimonials.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('testimonials.create') }}
@stop

@section('content')
    @include('admin.testimonials.form')
@endsection
