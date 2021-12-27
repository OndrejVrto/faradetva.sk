@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('asset/backend/css/admin_custom.css') }}">
	{{-- <script src="{{ asset('vendor/debugbar.js') }}"></script> --}}
@stop

@section('js')
	<script src="{{ asset('asset/backend/js/admin_custom.js') }}"></script>
@stop

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
