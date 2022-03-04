@extends('adminlte::page')

@section('footer')
    <div class="text-center text-lg-right small mt-3 mt-lg-0">
        Aplikáciu naprogramoval <span class="text-bold mx-2">Ing. Ondrej VRŤO</span> v roku pána 2022.
    </div>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/backend/css/admin_custom.css') }}">
@endpush

@push('js')
    <script @nonce src="{{ asset('asset/backend/js/admin_app.js') }}"></script>
    <script @nonce src="{{ asset('asset/backend/js/admin_custom.js') }}"></script>

    @toastr_render(csp_nonce())

    <script @nonce>
        var myTimer = new Timer({
            minutes: {{ config('session.lifetime') }},
            seconds: 0,
            element: document.querySelector('#time')
        });

        myTimer.start();
    </script>
@endpush
