@extends('frontend._layouts.page')

@section('title', 'Svätý František' )
@section('meta_description', 'Patrón farnosti Detva - sv.František s Assisi.' )
@section('keywords', 'František, Assisi, Detva, patrón, história, svetec')

{{-- @section('content_breadcrumb')
	{{ Breadcrumbs::render('news.show', $one_news, $one_news->title )}}
@stop --}}

@push('content')
	@include('frontend._sections.skill')
@endsection


@section('content')
	<h1>XXX</h1>
@endsection
