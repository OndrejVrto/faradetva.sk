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
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: 'textarea#editorContent',
            language: 'sk',
            relative_urls: false,
            // plugins: 'code table lists',
            plugins: 'code lists print preview powerpaste casechange tinydrive searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime checklist wordcount a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed tinycomments mentions linkchecker emoticons advtable export',

            toolbar: "undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | link image media",
            toolbar_mode: 'floating',

            height: 550,
            image_caption: true,

            file_picker_callback : function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'admin/laravel-file-manager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);

    </script>
@endpush
