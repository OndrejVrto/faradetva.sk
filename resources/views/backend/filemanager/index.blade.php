@extends('backend._layouts.app')

@section('title', 'FileManager')
@section('meta_description', 'Správa pohľadových súborov' )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('file-manager') }}
@stop

@section('content')
    <iframe
        class="iframe-full-height w-100"
        src="{{ asset('vendor/tiny-file-manager/TinyFileManager.php') }}"
        class="w-100"
        frameborder="0"
        scrolling="no"
        style="min-height: 1000px !important;">
    </iframe>
@endsection

@push('js')
    <script>
        $('.iframe-full-height').on('load', function(){
            this.style.height=this.contentWindow.document.body.scrollHeight + 'px'
        });
    </script>
@endpush
