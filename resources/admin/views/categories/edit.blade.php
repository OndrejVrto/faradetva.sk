@extends('_layouts.app')

@section('title', 'Kategória')

@section('meta-tags')
	<meta name="description" content="Administrácia - Editácia Kategórie" />
@stop

@section('content_header')
    <h1>Úprava kategórie</h1>
@stop

@section('content')

	@include('categories.form', [ 'type' => 'edit' ])

@endsection
