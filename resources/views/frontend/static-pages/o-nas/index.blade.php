@extends('frontend._layouts.static-page')
@push('content_header')
    {{-- Prepend content Header --}}
    <x-banner
        :header="$pageData['header']"
        :breadcrumb="$breadCrumb"
        titleSlug="kalvaria, tekvice"
        dimensionSource="full"
    />
@endpush
@prepend('content_footer')
    {{-- After content Footer --}}
@endprepend

@section('content')
    <x-page-section.header :header="$pageData['header']" class="my-0"/>

    <div class="row text-left">
        <div class="col-lg-4 m-auto">
            <x-page-section title="O nás / História">
                <x-page-section.text type="right">
                    <ol>
                        <li><a href="{{ url('o-nas/historia-farnosti') }}">História farnosti Detva</a></li>
                        <li class="pb-2"><a href="{{ url('o-nas/vianoce-v-detve') }}">Vianoce v Detve</a></li>
                        <span>Významné osobnosti</span>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/imrich-durica') }}">Imrich Ďurica</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/jozef-zavodsky') }}">Jozef Závodský</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/prof-thdr-jozef-buda') }}">prof. Jozef Búda</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/anton-prokop') }}">Anton Prokop</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/mons-jan-strban') }}">Mons. Ján Štrbáň</a></li>
                        <li class="pb-2"><a href="{{ url('o-nas/historia/vyznamne-osobnosti/karol-anton-medvecky') }}">Karol Anton Medvecký</a></li>
                        <span>Patrón farnosti</span>
                        <li><a href="{{ url('o-nas/patron-farnosti') }}">Svätý František</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>
        </div>
    </div>

@endsection

