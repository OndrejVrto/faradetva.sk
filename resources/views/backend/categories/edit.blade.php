@extends('backend._layouts.app')

@section('title', __('backend-texts.categories.title'))
@section('meta_description', __('backend-texts.categories.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('categories.edit', false, $category, $category->title )}}
@stop

@section('content')
    @include('backend.categories.form')
@endsection
