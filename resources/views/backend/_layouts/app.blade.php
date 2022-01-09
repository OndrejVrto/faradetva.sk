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
    <script src="{{ asset('asset/backend/js/admin_custom.js') }}"></script>
@endpush

@if(session()->has('message'))
    @once
    @push('js')
    <script>
        /**
         * --------------------------------------
         * Create alert modal
         *
         */
        var type = "{{ Session::get('alert-type', 'success') }}";

        toastr.options = {
            closeButton: false,
            debug: false,
            newestOnTop: true,
            progressBar: true,
            positionClass: "toast-top-right",
            // preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };

        switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.options.timeOut = "30000";
            toastr.error("{{ Session::get('message') }}");
            break;
        }

    </script>
    @endpush
    @endonce
@endif
