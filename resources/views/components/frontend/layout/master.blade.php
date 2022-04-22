@props([
    'disablePreload' => false,
    'header' => null,
    'pageData',
])
@if( isset($pageData['breadCrumbJsonLd']) AND Str::contains($pageData['breadCrumbJsonLd'], 'BreadcrumbList') )
    @push('BreadCrumbJSonLd')
        {!! $pageData['breadCrumbJsonLd'] !!}
    @endpush
@endif

<x-frontend.layout.general>

    @if ( !$disablePreload )
        <x-frontend.sections.preload />
    @endif

    <x-frontend.sections.menu />

    <!-- MASTER CONTENT Start -->
    <main>
        @isset($pageData)
            @if(count($pageData['banners']) > 0)
                <x-frontend.sections.banner
                    :header="$pageData['title']"
                    :breadcrumb="$pageData['breadCrumb']"
                    :titleSlug="$pageData['banners']"
                    dimensionSource="full"
                />
            @elseif($header === null)
                <x-frontend.page.section name="MASTER HEADER" class="static-page pad_t_50">
                    <x-frontend.page.section-header :header="$pageData['header']"/>
                </x-frontend.page.section>
            @endif

            {{ $slot }}

            @if(count($pageData['faqs']) > 0)
                <x-frontend.sections.faq
                    :questionsSlug="$pageData['faqs']"
                />
            @endif
        @else
            {{ $slot }}
        @endisset
    </main>
    <!-- MASTER CONTENT End -->

    <x-frontend.sections.footer />

    <x-frontend.sections.search-global />

    <x-slot name="css_general">
        <link @nonce rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/font-awesome-5.15.4.css') }}"> --}}
        <link @nonce rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/bootstrap-5.1.3/bootstrap.css') }}"> --}}
        <link @nonce rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"/>

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/js/plugins/owl-crousel/owl.carousel.css') }}"> --}}
        {{-- <link @nonce rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"/> --}}
        <link @nonce rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/flaticon.css') }}"> --}}

        <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom-template.css') }}">
        <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom-responsive.css') }}">
        <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom-animation.css') }}">
        <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom.css') }}">
        @livewireStyles(['nonce' => csp_nonce()])
    </x-slot>

    <x-slot name="js_general">
        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/jquery.js') }}"></script> --}}
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/bootstrap-5.1.3/bootstrap.js') }}"></script> --}}
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>

        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/owl-crousel/owl.carousel.js') }}"></script> --}}
        {{-- <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> --}}
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/animation/wow.min.js') }}"></script> --}}
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/animation/jquery.appear.js') }}"></script> --}}
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.appear/0.4.1/jquery.appear.min.js"></script>

        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/counter/jquery.countTo.js') }}"></script> --}}
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countto/1.2.0/jquery.countTo.min.js"></script>

        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/custom-share.js') }}"></script>
        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/custom.js') }}"></script>
        @livewireScripts(['nonce' => csp_nonce()])
    </x-slot>

</x-frontend.layout.general>
