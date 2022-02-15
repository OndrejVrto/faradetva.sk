@extends('adminlte::page')

@section('footer')
    <div class="text-center text-lg-right small mt-3 mt-lg-0">
        Aplikáciu naprogramoval <span class="text-bold mx-2">Ing. Ondrej VRŤO</span> v roku pána 2022.
    </div>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('asset/backend/css/admin_custom.css') }}">
    {{-- <script src="{{ asset('vendor/debugbar.js') }}"></script> --}}
@endpush

@push('js')
    <script src="{{ asset('asset/backend/js/admin_app.js') }}"></script>
    <script src="{{ asset('asset/backend/js/admin_custom.js') }}"></script>
    @toastr_js
    @toastr_render
    <script>
        var myTimer = new Timer({
            minutes: {{ config('auth.password_timeout')/60 }},
            seconds: 0,
            element: document.querySelector('#time')
        });

        myTimer.start();
    </script>
@endpush
