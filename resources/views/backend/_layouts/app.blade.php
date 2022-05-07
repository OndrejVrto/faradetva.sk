@extends('adminlte::page')

@push('meta_tags')
    <base href="{{ config('app.url') }}">
@endpush

@section('footer')
    <div class="small">
        Aplikáciu naprogramoval <a href="https://ondrejvrto.eu" target="_blank" class="text-bold text-warning mx-2">Ing. Ondrej VRŤO</a> v roku pána 2022.
    </div>
@stop

@prepend('css')
    <link @nonce rel="stylesheet" href="{{ asset(mix('asset/admin-app.css'), true) }}">
@endprepend

@prepend('js')
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/admin-app.js'), true) }}"></script>

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
