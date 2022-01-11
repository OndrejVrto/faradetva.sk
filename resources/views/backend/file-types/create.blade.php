@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.file-types_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.file-types_description_create') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('file-types.create') }}
@stop

@section('content')
    @include('backend.file-types.form')
@endsection
