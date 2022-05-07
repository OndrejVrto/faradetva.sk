@extends('admin._layouts.app')

@section('title', __('backend-texts.files.title'))
@section('meta_description', __('backend-texts.files.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('files.edit', false, $file, $file->name )}}
@stop

@section('content')
    @include('admin.files.form')
@endsection
