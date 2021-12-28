@extends('_layouts.app')

@section('title', 'Svedectvá')

@section('meta-tags')
	<meta name="description" content="Administrácia - pridanie nového svedectva viery" />
@stop

@section('content_header')
    <h1>Nové svedectvo viery</h1>
@stop

@section('content')

	@include('testimonials.form', [ 'type' => 'create' ])

@endsection
