@extends('backend._layouts.app')

@section('title', __('backend-texts.sliders.title'))
@section('meta_description', __('backend-texts.sliders.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('sliders.create') }}
@stop

@section('content')
    @include('backend.sliders.form')
@endsection
