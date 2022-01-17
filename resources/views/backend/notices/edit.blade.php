@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.notices_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.notices_description_edit') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('notices.edit', $notice, $notice->title )}}
@stop

@section('content')
    @include('backend.notices.form')
@endsection
