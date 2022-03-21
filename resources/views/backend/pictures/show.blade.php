@extends('backend._layouts.app')

@section('title', __('backend-texts.pictures.title'))
@section('meta_description', __('backend-texts.pictures.description_show'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('pictures.show', false, $picture, $picture->title )}}
@stop

@php
    $controlerName = 'pictures';
    $columns = 9;

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $picture ) ) {
        $typeForm = 'show';
        $identificator = $picture->slug;
        $createdInfo = $picture->created_at;
        $updatedInfo = $picture->updated_at;
    }
@endphp

@section('content')

    <x-backend.form
        controlerName="{{ $controlerName }}" columns="{{ $columns }}"
        typeForm="{{ $typeForm }}"  identificator="{{ $identificator }}"
        createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}">

        <div class="row">
            <div class="col-lg-4">
                <dt>Titulok</dt>
                    <dd>{{ $picture->title ?? '---' }}</dd>
                <dt>Popis</dt>
                    <dd>{{ $picture->source->description ?? '---' }}</dd>
                <dt>Zdroj:</dt>
                    <dd>{{ $picture->source->source ?? '---' }}</dd>
                <dt>Zdroj URL:</dt>
                    <dd>{{ $picture->source->source_url ?? '---' }}</dd>
                <dt>Autor:</dt>
                    <dd>{{ $picture->source->author ?? '---' }}</dd>
                <dt>Autor URL:</dt>
                    <dd>{{ $picture->source->author_url ?? '---' }}</dd>
                <dt>Licencia:</dt>
                    <dd>{{ $picture->source->license ?? '---' }}</dd>
                <dt>Licencia URL:</dt>
                    <dd>{{ $picture->source->license_url ?? '---' }}</dd>
            </div>
            <div class="col-lg-8 mb-4">
                <dt>Náhľad:</dt>
                <div class="border border-2 border-warning pt-2 pb-3">
                    <x-partials.picture titleSlug="{{ $picture->slug }}" columns="12"/>
                </div>
            </div>
        </div>

    </x-backend.form>

@endsection
