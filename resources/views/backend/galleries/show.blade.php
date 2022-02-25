@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.galleries_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.galleries_description_show') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('galleries.show', $gallery, $gallery->title )}}
@stop

@php
    $controlerName = 'galleries';
    $columns = 12;

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

        <div class="row">
            <div class="col-lg-3">
                <dt>Titulok</dt>
                    <dd>{{ $gallery->title ?? '---' }}</dd>
                <dt>Popis</dt>
                    <dd>{{ $gallery->source->description ?? '---' }}</dd>
                <dt>Zdroj:</dt>
                    <dd>{{ $gallery->source->source ?? '---' }}</dd>
                <dt>Zdroj URL:</dt>
                    <dd>{{ $gallery->source->source_url ?? '---' }}</dd>
                <dt>Autor:</dt>
                    <dd>{{ $gallery->source->author ?? '---' }}</dd>
                <dt>Autor URL:</dt>
                    <dd>{{ $gallery->source->author_url ?? '---' }}</dd>
                <dt>Licencia:</dt>
                    <dd>{{ $gallery->source->license ?? '---' }}</dd>
                <dt>Licencia URL:</dt>
                    <dd>{{ $gallery->source->license_url ?? '---' }}</dd>
            </div>
            <div class="col-lg-9 mb-4">
                <dt>Náhľad:</dt>
                <div class="border border-2 border-warning p-3">
                    <x-photo-gallery titleSlug="{{ $gallery->slug }}"/>
                </div>
            </div>
        </div>

    </x-admin-form>

@endsection
