@extends('backend._layouts.app')

@section('title', __('backend-texts.'.$controller.'.title'))
@section('meta_description', __('backend-texts.'.$controller.'.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render($controller.'.edit', false, $notice, $notice->title )}}
@stop

@section('content')
    @include('backend.notices.form')
@endsection
