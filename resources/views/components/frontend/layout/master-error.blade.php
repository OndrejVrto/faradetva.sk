<x-frontend.layout.general>

    <x-slot name="css_general">
        {{-- <link @nonce rel="stylesheet" type="text/css" crossorigin="anonymous" referrerpolicy="no-referrer" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"> --}}
        @googlefonts
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/bootstrap-5.1.3/bootstrap.css', true) }}"> --}}
        <link @nonce rel="stylesheet" type="text/css" crossorigin="anonymous" referrerpolicy="no-referrer" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"/>
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/font-awesome-5.15.4.css', true) }}"> --}}
        <link @nonce rel="stylesheet" type="text/css" crossorigin="anonymous" referrerpolicy="no-referrer" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom-template.css', true) }}">
        <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom-responsive.css', true) }}">
        {{-- <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom-animation.css', true) }}"> --}}
        <link @nonce rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom.css', true) }}">
    </x-slot>

    <x-slot name="js_general">
        <script @nonce>
            document.addEventListener('DOMContentLoaded', function () {
                window.setTimeout( document.querySelector('svg').classList.add('animated'), 1000);
            })
        </script>
    </x-slot>

    <!-- MASTER ERROR CONTENT Start -->
    <main>
        <div class="container d-flex min-vh-100">
            <div class="row w-100 justify-content-center align-self-center">
                <div class="col-md-6 p-5 p-lg-0 my-auto">
                    {{ $image }}
                </div>
                <div class="col-md-7 col-lg-6 my-auto pb-5 pb-lg-0 text-center">
                    <h1 class="display-1">{{ $errorNumber }}</h1>

                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>
    <!-- MASTER ERROR CONTENT End -->

</x-frontend.layout.general>
