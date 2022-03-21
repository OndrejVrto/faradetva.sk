@extends('backend._layouts.app')

@section('title', __('backend-texts.roles.title'))
@section('meta_description', __('backend-texts.roles.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('roles.edit', false, $role, $role->name )}}
@stop

@section('content')
    @include('backend.roles.form')
@endsection
