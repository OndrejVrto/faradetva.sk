@extends('backend._layouts.app')

@section('title', __('backend-texts.day-ideas.title'))
@section('meta_description', __('backend-texts.day-ideas.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('day-ideas.edit', false, $dayIdea, $dayIdea->author )}}
@stop

@section('content')
    @include('backend.day-ideas.form')
@endsection
