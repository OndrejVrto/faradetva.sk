@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.roles_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.roles_description_edit') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('roles.edit', $role, $role->name )}}
@stop

@section('content')
	@include('backend.roles.form')
@endsection
