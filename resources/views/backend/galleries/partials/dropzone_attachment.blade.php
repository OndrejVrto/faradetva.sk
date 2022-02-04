<div class="form-group">
    <label>Obrázky</label>
    <div class="needsclick dropzone" id="document-dropzone"></div>
    {{-- Error feedback --}}
    @error('picture')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $errors->first('picture.*') }}</strong>
        </span>
    @enderror
</div>

@push('css')
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script> --}}
    <script>
        var uploadedDocumentMap = {}

        Dropzone.options.documentDropzone = {
            url: '{{ route('galleries.storeMedia') }}',
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            paramName: "pictures",
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.bmp,.tif,.tiff",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "Sem vlož obrázky galérie pre upload",
            dictFallbackMessage: "Váš prehliadač nepodporuje vkladanie súborov preťahovaním.",
            dictFallbackText: "Na nahranie súborov použite záložný formulár nižšie.",
            dictInvalidFileType: "Súbory tohto typu nemôžete nahrať.",
            dictCancelUploadConfirmation: "Naozaj chcete zrušiť toto nahrávanie?",
            dictRemoveFile: "Odstrániť súbor",
            dictMaxFilesExceeded: "Nemôžete nahrať žiadne ďalšie súbory.",
            dictCancelUpload: "Zrušiť nahrávanie",
            @verbatim
            dictFileTooBig: "Súbor je príliš veľký ({{filesize}}MiB). Maximálna veľkosť: {{maxFilesize}}MiB.",
            dictResponseError: "Server odpovedal kódom {{statusCode}}.",
            @endverbatim

            success: function (file, response) {
                $('form').append('<input type="hidden" name="picture[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="picture[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($pictures))
                    var files =
                        {!! json_encode($pictures) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.original_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="picture[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }
    </script>
@endpush
