@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.categories_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.categories_description_create') )
@section('content_header', config('farnost-detva.admin_texts.categories_header_create') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('categories.create') }}
@stop

@section('content')
	@include('backend.categories.form', [ 'type' => 'create' ])
@endsection
