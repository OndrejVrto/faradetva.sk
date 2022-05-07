@extends('admin._layouts.app')

@section('title', __('backend-texts.users.title'))
@section('meta_description', __('backend-texts.users.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('users.edit', false, $user, $user->name )}}
@stop

@section('content')
    @include('admin.users.form')
@endsection
