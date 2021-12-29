@extends('_layouts.app')

@section('title', 'Kľúčové slová')

@section('meta-tags')
	<meta name="description" content="Administrácia - vytvorenie nového Kľúčového slova (tagu)" />
@stop

@section('content_header')
    <h1>Nové kľúčové slovo</h1>
@stop

@section('content')

	@include('tags.form', [ 'type' => 'create' ])

@endsection
