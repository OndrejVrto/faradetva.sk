@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.galleries_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.galleries_description_show') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('galleries.show', $gallery, $gallery->title )}}
@stop

@php
    $controlerName = 'galleries';
    $columns = 11;

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $gallery ) ) {
        $typeForm = 'show';
        $identificator = $gallery->slug;
        $createdInfo = $gallery->created_at;
        $updatedInfo = $gallery->updated_at;
    }
@endphp

@section('content')

    <x-admin-form
        controlerName="{{ $controlerName }}" columns="{{ $columns }}"
        typeForm="{{ $typeForm }}"  identificator="{{ $identificator }}"
        createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}">

        <x-photo-gallery titleSlug="{{ $gallery->slug }}"/>

    </x-admin-form>

@endsection
