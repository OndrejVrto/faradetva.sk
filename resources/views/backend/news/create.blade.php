@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.news_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.news_description_create') )
@section('content_header', config('farnost-detva.admin_texts.news_header_create') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('news.create') }}
@stop

@section('content')
	@include('backend.news.form', [ 'type' => 'create' ])
@endsection
