@extends('_layouts.app')

@section('title', config('farnost-detva.admin_texts.tags_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.tags_description_create') )
@section('content_header', config('farnost-detva.admin_texts.tags_header_create') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('tags.create') }}
@stop

@section('content')
	@include('tags.form', [ 'type' => 'create' ])
@endsection
