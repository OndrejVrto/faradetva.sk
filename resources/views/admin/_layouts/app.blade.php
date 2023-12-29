@extends('adminlte::page')

@push('meta_tags')
    <base href="{{ config('app.url') }}">
@endpush

@section('footer')
    <div class="small">
        Aplikáciu naprogramoval <a href="https://ondrejvrto.eu" target="_blank" class="text-bold text-warning mx-2">Ing. Ondrej VRŤO</a> v roku pána 2022-2023.
    </div>
@stop

@section('content_top_nav_center')
    @if ($maintenanceMode)
        <span class="h3 text-warning mb-0 text-bold">
            Údržbový mód aktívny
        </span>
    @endif
@endsection

@prepend('css')
    <link @nonce rel="stylesheet" href="{{ asset(mix('asset/admin-app.css'), true) }}">
@endprepend

@prepend('js')
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/admin-app.js'), true) }}"></script>

    @toastr_render(csp_nonce())

    @php
        $remember = collect(Cookie::get())
                        ->filter(function ($val, $key) {
                            return strpos($key, 'remember_web') !== false;
                        })
                        ->first();
    @endphp
    @if (is_null($remember))
        <script @nonce>
            const myTimer = new Timer({
                minutes: {{ config('session.lifetime') }},
                seconds: 0,
                element: document.querySelector('#time')
            });

            myTimer.start();
        </script>
    @endif
@endprepend
