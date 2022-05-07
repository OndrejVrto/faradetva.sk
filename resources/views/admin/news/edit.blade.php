@extends('admin._layouts.app')

@section('title', __('backend-texts.news.title'))
@section('meta_description', __('backend-texts.news.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('news.edit', false, $news, $news->title )}}
@stop

@section('content')
    @include('admin.news.form')
@endsection
