@extends('_layouts.app')

@section('title', 'Slider')

@section('meta-tags')
	<meta name="description" content="Administrácia - pridanie nového Slider-u s myšlienkou" />
@stop

@section('content_header')
    <h1>Nový obrázok s myšlienkou</h1>
@stop

@section('content')

	@include('sliders.form', [ 'type' => 'create' ])

@endsection
