@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.roles_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.roles_description_create') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('roles.create') }}
@stop

@section('content')
	@include('backend.roles.form')
@endsection
