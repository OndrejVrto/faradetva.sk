@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.pictures_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.pictures_description_show') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('pictures.show', $picture, $picture->title )}}
@stop

@php
    $controlerName = 'pictures';
    $columns = 11;

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $picture ) ) {
        $typeForm = 'show';
        $identificator = $picture->slug;
        $createdInfo = $picture->created_at;
        $updatedInfo = $picture->updated_at;
    }
@endphp

@section('content')

    <x-admin-form
        controlerName="{{ $controlerName }}" columns="{{ $columns }}"
        typeForm="{{ $typeForm }}"  identificator="{{ $identificator }}"
        createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}">

        {{-- TODO:  Apply component picture --}}
        {{ $picture->title }}

    </x-admin-form>

@endsection
