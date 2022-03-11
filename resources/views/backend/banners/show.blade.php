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

    <x-backend.form
        controlerName="{{ $controlerName }}" columns="{{ $columns }}"
        typeForm="{{ $typeForm }}"  identificator="{{ $identificator }}"
        createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}">

        <h1>{{ $banner->title }}</h1>

        <div class="row container-banner-show">
            <div class="col border border-2 border-warning p-3 pb-5">
                <x-banner
                    {{-- :header="$banner->title" --}}
                    {{-- :breadcrumb="" --}}
                    :titleSlug="$banner->slug"
                    dimensionSource="full"
                />
            </div>
        </div>

    </x-backend.form>

@endsection
