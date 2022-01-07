@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.news_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.news_description_edit') )
@section('content_header', config('farnost-detva.admin_texts.news_header_edit' ))

@section('content_breadcrumb')
	{{ Breadcrumbs::render('news.edit', $news, $news->title )}}
@stop

@section('content')
	@include('backend.news.form')
@endsection
