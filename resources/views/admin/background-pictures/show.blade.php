@extends('admin._layouts.app')

@section('title', __('backend-texts.background-pictures.title'))
@section('meta_description', __('backend-texts.background-pictures.description_show'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('background-pictures.show', false, $backgroundPicture, $backgroundPicture->title )}}
@stop

@php
    $controlerName = 'background-pictures';
    $columns = 9;

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $backgroundPicture ) ) {
        $typeForm = 'show';
        $identificator = $backgroundPicture->slug;
        $createdInfo = $backgroundPicture->created_at;
        $updatedInfo = $backgroundPicture->updated_at;
    }
@endphp

@section('content')

    <x-admin.form
        controlerName="{{ $controlerName }}" columns="{{ $columns }}"
        typeForm="{{ $typeForm }}"  identificator="{{ $identificator }}"
        createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}">

        <div class="row">
            <div class="col-lg-4">
                <dt>Titulok</dt>
                    <dd>{{ $backgroundPicture->title ?? '---' }}</dd>
                <dt>Popis</dt>
                    <dd>{{ $backgroundPicture->source->source_description ?? '---' }}</dd>
                <dt>Zdroj:</dt>
                    <dd>{{ $backgroundPicture->source->source_source ?? '---' }}</dd>
                <dt>Zdroj URL:</dt>
                    <dd>{{ $backgroundPicture->source->source_source_url ?? '---' }}</dd>
                <dt>Autor:</dt>
                    <dd>{{ $backgroundPicture->source->source_author ?? '---' }}</dd>
                <dt>Autor URL:</dt>
                    <dd>{{ $backgroundPicture->source->source_author_url ?? '---' }}</dd>
                <dt>Licencia:</dt>
                    <dd>{{ $backgroundPicture->source->source_license ?? '---' }}</dd>
                <dt>Licencia URL:</dt>
                    <dd>{{ $backgroundPicture->source->source_license_url ?? '---' }}</dd>
            </div>
            <div class="col-lg-8 mb-4">
                <dt>Náhľad:</dt>
                <div class="border border-2 border-warning p-1">
                    {!! (string) $backgroundPicture->getFirstMedia('background_picture')->img('extra-large',[
                        'class' => 'w-100 img-fluid',
                        'alt' => $backgroundPicture->source->source_description,
                        'nonce' => csp_nonce(),
                    ]) !!}
                </div>
            </div>
        </div>

    </x-admin.form>

@endsection
