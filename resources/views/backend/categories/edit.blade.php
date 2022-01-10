@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.categories_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.categories_description_edit') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('categories.edit', $category, $category->title )}}
@stop

@section('content')
    @include('backend.categories.form')
@endsection