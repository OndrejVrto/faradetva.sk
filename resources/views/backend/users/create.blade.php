@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.users_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.users_description_create') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('users.create') }}
@stop

@section('content')
	@include('backend.users.form')
@endsection
