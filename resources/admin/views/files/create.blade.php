@extends('_layouts.app')

@section('title', 'Vkladanie príloh')

@section('meta-tags')
	<meta name="description" content="Administrácia - vkladanie príloh" />
@stop

@section('content_header')
    <h1>Vkladanie príloh</h1>
@stop

@section('content')

	@include('files.form', [
		'type' => 'create',
		'button_text' => 'Uložiť prílohy'
	])

@endsection
