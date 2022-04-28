@extends('adminlte::page')

@push('meta_tags')
    <base href="{{ config('app.url') }}">
@endpush

@section('footer')
    <div class="text-center text-lg-right small mt-3 mt-lg-0">
        Aplikáciu naprogramoval <span class="text-bold mx-2">Ing. Ondrej VRŤO</span> v roku pána 2022.
    </div>
@stop

@prepend('css')
    <link @nonce rel="stylesheet" href="{{ asset('asset/backend/css/admin_custom.css') }}">
@endprepend

@prepend('js')
    <script @nonce type="text/javascript" src="{{ asset('asset/backend/js/admin_custom.js') }}"></script>

    @toastr_render(csp_nonce())

    <script @nonce>
        const myTimer = new Timer({
            minutes: {{ config('session.lifetime') }},
            seconds: 0,
            element: document.querySelector('#time')
        });

        myTimer.start();
    </script>
@endprepend
