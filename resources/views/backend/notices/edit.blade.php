@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.'.$controller.'_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.'.$controller.'_description_edit') )

@section('content_breadcrumb')
    {{  Breadcrumbs::render($controller.'.edit', false, $notice, $notice->title )}}
@stop

@section('content')
    @include('backend.notices.form')
@endsection
