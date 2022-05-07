@extends('backend._layouts.app')

@section('title', 'FileManager')
@section('meta_description', 'Správa pohľadových súborov' )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('file-manager') }}
@stop

@section('content')
    <iframe
        class="w-100 iframe-full-height"
        src="{{ asset('vendor/tiny-file-manager/TinyFileManager.php', true) }}"
        frameborder="0"
        {{-- scrolling="no" --}}
        style="min-height: 600px !important;"
    >
    </iframe>
@endsection

@push('js')
    <script @nonce>
        $('.iframe-full-height').on('load', function(){
            this.style.height=this.contentWindow.document.body.scrollHeight + 'px'
        });
    </script>
@endpush
