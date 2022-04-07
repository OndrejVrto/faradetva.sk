@extends('backend._layouts.app')

@section('title', __('backend-texts.day-ideas.title'))
@section('meta_description', __('backend-texts.day-ideas.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('day-ideas.create') }}
@stop

@section('content')
    @include('backend.day-ideas.form')
@endsection
