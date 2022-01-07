@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.permissions_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.permissions_description_edit') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('permissions.edit', $permission, $permission->title )}}
@stop

@section('content')
	@include('backend.permissions.form')
@endsection
