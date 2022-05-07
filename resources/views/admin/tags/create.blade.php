@extends('admin._layouts.app')

@section('title', __('backend-texts.tags.title'))
@section('meta_description', __('backend-texts.tags.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('tags.create') }}
@stop

@section('content')
    @include('admin.tags.form')
@endsection
