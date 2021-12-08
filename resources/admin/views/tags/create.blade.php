@extends('_layouts.app')

@section('title', 'Tag - vytvorenie nového Tagu')

@section('meta-tags')
	<meta name="description" content="Administrácia - vytvorenie nového Tagu" />
@stop

@section('content_header')
    <h1>Tag - nový</h1>
@stop

@section('content')

	@include('tags.form', [
		'type' => 'create',
		'button_text' => 'Vytvoriť Tag'
	])

@endsection
