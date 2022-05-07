@extends('admin._layouts.app')

@section('title', __('backend-texts.banners.title'))
@section('meta_description', __('backend-texts.banners.description_show'))

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

    <x-admin.form
        controlerName="{{ $controlerName }}" columns="{{ $columns }}"
        typeForm="{{ $typeForm }}"  identificator="{{ $identificator }}"
        createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}">

        <h3>{{ $banner->title }}</h3>
        <h5 class="lead">{{ $banner->source->description }}</h5>

        <div class="row container-banner-show">
            <div class="col border border-2 border-warning mx-2 mb-4 px-1 pb-4 pt-1">
                <x-web.sections.banner
                    header="{{ $banner->title }}"
                    titleSlug="{{ $banner->slug }}"
                    dimensionSource="full"
                />
            </div>
        </div>

        <div class="form-group">
            <h3>Zoznam stránok na ktorých sa zobrazuje tento baner</h3>
            <div class="row no-gutters row-cols-1 row-cols-xl-2">
                {{-- <div class="col text-break"> --}}
                    @forelse ($banner->staticPages as $page)
                        <dl class="">
                            <dt>{{ $page->header }}</dt>
                            <dd class="my-0">
                                <a href="{{ config('app.url').'/'.$page->url }}" target="_blank" rel="noopener noreferrer">
                                    <span class="small text-info">{{ config('app.url').'/'}}</span>{{ $page->url }}
                                </a>
                            </dd>
                            <dd class="small my-0">{{ $page->description }}</dd>
                        </dl>
                    @empty
                        <h3>Baner sa zatiaľ nevyužíva na žiadnej statickej stránke. Môže byť využitý ručne na ostatných stránkach.</h3>
                    @endforelse
                {{-- </div> --}}
            </div>
        </div>

    </x-admin.form>

@endsection
