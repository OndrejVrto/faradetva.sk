function initDropZone(id, url, token, files, propName, paramName, acceptedFiles) {

    let uploadedDocumentMap = {}

    const options  = {
        url,
        paramName,
        acceptedFiles,
        timeout: null,
        maxFilesize:  10000000, // 10 MB
        addRemoveLinks: true,
        // uploadMultiple: false,
        // parallelUploads: 1,
        // maxFiles: 50,
        headers: {
            'X-CSRF-TOKEN': token
        },
        dictDefaultMessage          : "Sem vlož súbory pre upload",
        dictFallbackMessage         : "Váš prehliadač nepodporuje vkladanie súborov preťahovaním.",
        dictFallbackText            : "Na nahranie súborov použite záložný formulár nižšie.",
        dictInvalidFileType         : "Súbory tohto typu nemôžete nahrať.",
        dictCancelUploadConfirmation: "Naozaj chcete zrušiť toto nahrávanie?",
        dictRemoveFile              : "Odstrániť súbor",
        dictMaxFilesExceeded        : "Nemôžete nahrať žiadne ďalšie súbory.",
        dictCancelUpload            : "Zrušiť nahrávanie",
        dictFileTooBig              : "Súbor je príliš veľký ({{filesize}}MiB). Maximálna veľkosť: {{maxFilesize}}MiB.",
        dictResponseError           : "Server odpovedal kódom {{statusCode}}.",

        success: function (file, response) {
            $('form').append(`<input type="hidden" name="${propName}[]" value="${response.name}">`)
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            let name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find(`input[name="${propName}[]"][value="${name}"]`).remove()
        },
        init: function () {
            if (files) {
                for (let i in files) {
                    let file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.original_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append(`<input type="hidden" name="${propName}[]" value="${file.file_name}">`)
                }
            }
        }
    }

    new Dropzone(id ,options);
}
