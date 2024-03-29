@props([
    'disablePreload' => false,
    'header' => null,
    'pageData',
])
<x-web.layout.general>

    @if ($maintenanceMode)
        <div class="sticky-top bg-danger text-center py-3">
            <span class="display-1 text-white text-bold">Údržbový mód</span>
        </div>
    @endif

    @include('cookie-consent::index')

    @if ( !$disablePreload )
        <x-web.sections.preload />
    @endif

    <x-web.sections.menu />

    <!-- MASTER CONTENT Start -->
    <main>
        @isset($pageData)
            <x-web.sections.banner
                :header="$pageData->header"
                :breadcrumb="$pageData->breadCrumb"
                :titleSlug="$pageData->banners"
                dimensionSource="full"
            />

            {{ $slot }}

            @if(count($pageData->faqs) > 0)
                <x-web.sections.faq
                    :questionsSlug="$pageData->faqs"
                />
            @endif
        @else
            {{ $slot }}
        @endisset
    </main>
    <!-- MASTER CONTENT End -->

    <x-web.sections.footer />

    <!-- BUTTON for Scroll up -->
    <div class="d-print-none">
        <div id="toTop">&#10148;</div>
    </div>

    <x-web.sections.search-global />


    <x-slot:css_general>
        {{-- <link @nonce rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"> --}}
        @googlefonts

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/font-awesome-5.15.4.css', true) }}"> --}}
        {{-- <link @nonce rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/> --}}
        <link @nonce rel="stylesheet" type="text/css" crossorigin="anonymous" referrerpolicy="no-referrer" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/bootstrap-5.1.3/bootstrap.css', true) }}"> --}}
        {{-- <link @nonce rel="stylesheet" type="text/css" crossorigin="anonymous" referrerpolicy="no-referrer" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"/> --}}
        {{-- <link @nonce rel="stylesheet" type="text/css" crossorigin="anonymous" referrerpolicy="no-referrer" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"/> --}}
        <link @nonce rel="stylesheet" type="text/css" href="{{ asset(mix('asset/app-bootstrap.css'), true) }}">

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/js/plugins/owl-crousel/owl.carousel.css', true) }}"> --}}
        {{-- <link @nonce rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"/> --}}
        <link @nonce rel="stylesheet" type="text/css" crossorigin="anonymous" referrerpolicy="no-referrer" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/flaticon.css', true) }}"> --}}

        {{-- <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom-template.css', true) }}"> --}}
        {{-- <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom-responsive.css', true) }}"> --}}
        {{-- <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom-animation.css', true) }}"> --}}
        {{-- <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom.css', true) }}"> --}}
        <link @nonce rel="stylesheet" type="text/css" href="{{ asset(mix('asset/app.css'), true) }}">
        @livewireStyles(['nonce' => csp_nonce()])
    </x-slot>

    <x-slot:js_general>
        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/jquery.js', true) }}"></script> --}}
        {{-- <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
        <script @nonce type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/bootstrap-5.1.3/bootstrap.js', true) }}"></script> --}}
        {{-- <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script> --}}
        {{-- <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> --}}
        <script @nonce type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/owl-crousel/owl.carousel.js', true) }}" crossorigin="anonymous"></script> --}}
        {{-- <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous"></script> --}}
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" crossorigin="anonymous"></script>

        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/animation/wow.min.js', true) }}" crossorigin="anonymous"></script> --}}
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" crossorigin="anonymous"></script>

        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/animation/jquery.appear.js', true) }}" crossorigin="anonymous"></script> --}}
        <script @nonce type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery.appear@1.0.1/jquery.appear.min.js" crossorigin="anonymous"></script>

        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/custom-share.js', true) }}"></script> --}}
        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/custom.js', true) }}"></script> --}}
        <script @nonce type="text/javascript" src="{{ asset(mix('asset/app.js'), true) }}"></script>

        @livewireScripts(['nonce' => csp_nonce()])
    </x-slot>

</x-web.layout.general>
