@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.banners_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.banners_description_show') )

@section('content_breadcrumb')
    {{  Breadcrumbs::render('banners.show', false, $banner, $banner->title )}}
@stop

@php
    $controlerName = 'banners';
    $columns = 11;

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $banner ) ) {
        $typeForm = 'show';
        $identificator = $banner->slug;
        $createdInfo = $banner->created_at;
        $updatedInfo = $banner->updated_at;
    }
@endphp

@section('content')

    <x-admin-form
        controlerName="{{ $controlerName }}" columns="{{ $columns }}"
        typeForm="{{ $typeForm }}"  identificator="{{ $identificator }}"
        createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}">

        <div class="row" style="min-height: 480px">
            <div class="col border border-2 border-warning p-3">
                <div class="w-100">
                    <x-banner titleSlug="{{ $banner->slug }}"/>
                </div>
            </div>
        </div>

    </x-admin-form>

@endsection
