<div class="form-group">
    <label>Prílohy</label>
    <div class="needsclick dropzone" id="document-dropzone"></div>
</div>

@push('css')
    <link @nonce rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('js')
    <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script @nonce type="text/javascript" src="{{ asset('asset/backend/js/custom-dropzone.js') }}"></script>

    <script @nonce>
        initDropZone(
            "{{ route('news.storeMedia') }}",
            "{{ csrf_token() }}",
            {!! json_encode($documents) !!},
            "document",
            "doc"
        );
    </script>
@endpush
