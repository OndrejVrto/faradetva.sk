@extends('backend._layouts.app')

@section('title', __('backend-texts.faqs.title'))
@section('meta_description', __('backend-texts.faqs.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('faqs.create') }}
@stop

@section('content')
    @include('backend.faqs.form')
@endsection
