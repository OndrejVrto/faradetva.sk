@extends('_layouts.app')

@section('title', 'Kategória')

@section('meta-tags')
	<meta name="description" content="Administrácia - Vytvorenie novej kategórie" />
@stop

@section('content_header')
    <h1>Nová kategória</h1>
@stop

@section('content')

	@include('categories.form', [ 'type' => 'create' ])

@endsection
