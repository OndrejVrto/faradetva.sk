@extends('backend._layouts.app')

@section('title', __('backend-texts.files.title'))
@section('meta_description', __('backend-texts.files.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('files.edit', false, $file, $file->name )}}
@stop

@section('content')
    @include('backend.files.form')
@endsection
