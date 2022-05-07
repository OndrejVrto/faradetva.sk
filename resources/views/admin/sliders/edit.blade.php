@extends('admin._layouts.app')

@section('title', __('backend-texts.sliders.title'))
@section('meta_description', __('backend-texts.sliders.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('sliders.edit', false, $slider, $slider->breadcrumb_teaser )}}
@stop

@section('content')
    @include('admin.sliders.form')
@endsection
