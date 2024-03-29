<div class="form-group">
    <label>Obrázky</label>
    <div class="needsclick dropzone" id="document-dropzone"></div>
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
            "{{ route('galleries.storeMedia') }}",
            "{{ csrf_token() }}",
            {!! json_encode($pictures) !!},
            "picture",
            'pictures',
            ".jpeg,.jpg,.png,.gif,.bmp,.tif,.tiff",
        );
    </script>
@endpush
