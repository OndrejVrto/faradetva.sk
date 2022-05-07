@extends('admin._layouts.app')

@section('title', __('backend-texts.categories.title'))
@section('meta_description', __('backend-texts.categories.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('categories.create') }}
@stop

@section('content')
    @include('admin.categories.form')
@endsection
