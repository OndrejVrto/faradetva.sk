@extends('backend._layouts.app')

@section('title', __('backend-texts.tags.title'))
@section('meta_description', __('backend-texts.tags.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('tags.edit', false, $tag, $tag->title )}}
@stop

@section('content')
    @include('backend.tags.form')
@endsection
