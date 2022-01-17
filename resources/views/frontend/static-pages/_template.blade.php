@extends('frontend._layouts.static-page')
@push('content_header')
    {{-- Prepend content Header --}}
@endpush
@prepend('content_footer')
    {{-- After content Footer --}}
@endprepend

@section('content')

    <x-page-section>
        <x-page-section.img columns="4" type="left" alt="" url="{{ asset('images/.jpg') }}" />
        <x-page-section.text type="right">
            <h6 class="text-church-template"></h6>
            <h6 class="text-church-template"></h6>
            <p>

            </p>
        </x-page-section.text>
        <x-page-section.text type="left">
            <p>

            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section.sources title="Zdroje:">
        <li>BARTKOVÁ, Anna. <em>Dejiny farnosti Detva</em>. Diplomová práca, 2008.</li>
    </x-page-section.sources>

@endsection
