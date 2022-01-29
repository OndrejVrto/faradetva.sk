@extends('frontend._layouts.static-page')

@push('content_header')
    {{-- Prepend content Header --}}
@endpush
@prepend('content_footer')
    {{-- After content Footer --}}
@endprepend

@section('content')
    <x-page-section >
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <h6 class="text-church-template">

            </h6>
            <h6 class="text-church-template">

            </h6>
            <p>

            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Nadpis 1">
        <x-page-section.img-media columns="5" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="left">
            <p>

            </p>
            <p>

            </p>
        </x-page-section.text>
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>

            </p>
            <p>

            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Nadpis 2">
        <x-page-section.img-media columns="5" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="left">
            <p>

            </p>
            <p>

            </p>
            <p>

            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Nadpis 3">
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>

            </p>
            <p>

            </p>
            <p>

            </p>
            <p>

            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Nadpis 4">
        <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="left">
            <p>

            </p>
            <p>

            </p>
            <p>

            </p>
            <p>

            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Nadpis 5">
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>

            </p>
            <p>

            </p>
            <p>

            </p>
            <p>

            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Nadpis 6">
        <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="left">
            <p>

            </p>
            <p>

            </p>
            <p>

            </p>
        </x-page-section.text>
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>

            </p>
            <p>

            </p>
            <p>

            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section.sources title="Použitá literatúra:">
        <li>BARTKOVÁ, Anna. <em>Dejiny farnosti Detva</em>. Diplomová práca, 2008.</li>

    </x-page-section.sources>

@endsection
