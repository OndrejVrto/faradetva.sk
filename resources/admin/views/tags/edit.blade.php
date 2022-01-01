@extends('_layouts.app')

@section('title', config('farnost-detva.admin_texts.tags_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.tags_description_edit') )
@section('content_header', config('farnost-detva.admin_texts.tags_header_edit' ))

@section('content_breadcrumb')
	{{ Breadcrumbs::render('tags.edit', $tag, $tag->title )}}
@stop

@section('content')
	@include('tags.form', [ 'type' => 'edit' ])
@endsection
