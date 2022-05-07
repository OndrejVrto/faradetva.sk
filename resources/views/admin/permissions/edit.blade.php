@extends('admin._layouts.app')

@section('title', __('backend-texts.permissions.title'))
@section('meta_description', __('backend-texts.permissions.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('permissions.edit', false, $permission, $permission->title )}}
@stop

@section('content')
    @include('admin.permissions.form')
@endsection
