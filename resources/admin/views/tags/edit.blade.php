@extends('_layouts.app')

@section('title', 'Kľúčové slová')

@section('meta-tags')
	<meta name="description" content="Administrácia - Editácia Kľúčového slova (tagu)" />
@stop

@section('content_header')
    <h1>Úprava kľúčového slova</h1>
@stop

@section('content')

	@include('tags.form', [ 'type' => 'edit' ])

@endsection
