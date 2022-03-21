@extends('backend._layouts.app')

@section('title', __('backend-texts.priests.title'))
@section('meta_description', __('backend-texts.priests.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('priests.edit', false, $priest, $priest->full_name_titles )}}
@stop

@section('content')
    @include('backend.priests.form')
@endsection
