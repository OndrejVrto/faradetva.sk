@extends('admin._layouts.app')

@section('title', __('backend-texts.prayers.title'))
@section('meta_description', __('backend-texts.prayers.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('prayers.edit', false, $prayer, $prayer->title )}}
@stop

@section('content')
    @include('admin.prayers.form')
@endsection
