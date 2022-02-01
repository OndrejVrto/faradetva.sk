<div class="form-group">
    <label>Prílohy</label>
    <div class="needsclick dropzone" id="document-dropzone"></div>
</div>

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
        var uploadedDocumentMap = {}

        Dropzone.options.documentDropzone = {
            url: '{{ route('news.storeMedia') }}',
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            paramName: "doc",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "Sem vlož súbory pre upload",
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
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
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
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($documents))
                    var files =
                        {!! json_encode($documents) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.original_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }
    </script>
@endpush
