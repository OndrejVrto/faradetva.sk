@extends('_layouts.app')

@section('title', 'Slider')

@section('meta-tags')
	<meta name="description" content="Administrácia - Editácia slider-u s myšlienkou" />
@stop

@section('content_header')
    <h1>Úprava obrázku s myšlienkou</h1>
@stop

@section('content')

	@include('sliders.form', [ 'type' => 'edit' ])

@endsection
