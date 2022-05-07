<div class="form-group">
    <label>Obsah článku</label>

    {{-- Error feedback --}}
    @error('content')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $errors->first('content') }}</strong>
        </span>
    @enderror

    <textarea name="content" id="editorContent">
        {{ $news->content ?? old('content') }}
    </textarea>
</div>

@push('js')
    <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.2/tinymce.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/admin-app-tinymce.js'), true) }}"></script>
@endpush
