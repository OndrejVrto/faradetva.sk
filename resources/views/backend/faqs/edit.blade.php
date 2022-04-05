@extends('backend._layouts.app')

@section('title', __('backend-texts.faqs.title'))
@section('meta_description', __('backend-texts.faqs.description_edit'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('faqs.edit', false, $faq, $faq->question )}}
@stop

@section('content')
    @include('backend.faqs.form')
@endsection
