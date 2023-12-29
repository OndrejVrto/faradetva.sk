<div class="form-group">
    <label>Prílohy</label>
    <div class="needsclick dropzone" id="document-dropzone"></div>
</div>

<div class="form-group">
    <label>Album</label>
    <div class="needsclick dropzone" id="album-dropzone"></div>
    {{-- Error feedback --}}
    @error('picture')
        <x-admin.error-message>
            {{ $errors->first('picture.*') }}
        </x-admin.error-message>
    @enderror
</div>

@push('css')
    <link @nonce rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('js')
    <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/admin-app-dropzone.js'), true) }}"></script>

    <script @nonce>
        initDropZone(
            '#document-dropzone',
            "{{ route('news.storeMedia') }}",
            "{{ csrf_token() }}",
            {!! json_encode($documents) !!},
            "document",
            "doc"
        );
        initDropZone(
            '#album-dropzone',
            "{{ route('news.storeAlbum') }}",
            "{{ csrf_token() }}",
            {!! json_encode($pictures) !!},
            "picture",
            'album-picture',
            ".jpeg,.jpg,.png,.gif,.bmp,.tif,.tiff",
        );
    </script>
@endpush
