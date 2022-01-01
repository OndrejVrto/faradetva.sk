@extends('_layouts.app')

@section('title', config('farnost-detva.admin_texts.categories_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.categories_description_edit') )
@section('content_header', config('farnost-detva.admin_texts.categories_header_edit' ))

@section('content_breadcrumb')
	{{ Breadcrumbs::render('categories.edit', $category, $category->title )}}
@stop

@section('content')
	@include('categories.form', [ 'type' => 'edit' ])
@endsection
