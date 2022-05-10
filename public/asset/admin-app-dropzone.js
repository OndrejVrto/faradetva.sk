function initDropZone(url, token, files, propName, paramName, acceptedFiles) {
  var uploadedDocumentMap = {};
  Dropzone.options.documentDropzone = {
    url: url,
    maxFilesize: 10,
    // MB
    addRemoveLinks: true,
    paramName: paramName,
    acceptedFiles: acceptedFiles,
    headers: {
      'X-CSRF-TOKEN': token
    },
    dictDefaultMessage: "Sem vlož súbory pre upload",
    dictFallbackMessage: "Váš prehliadač nepodporuje vkladanie súborov preťahovaním.",
    dictFallbackText: "Na nahranie súborov použite záložný formulár nižšie.",
    dictInvalidFileType: "Súbory tohto typu nemôžete nahrať.",
    dictCancelUploadConfirmation: "Naozaj chcete zrušiť toto nahrávanie?",
    dictRemoveFile: "Odstrániť súbor",
    dictMaxFilesExceeded: "Nemôžete nahrať žiadne ďalšie súbory.",
    dictCancelUpload: "Zrušiť nahrávanie",
    dictFileTooBig: "Súbor je príliš veľký ({{filesize}}MiB). Maximálna veľkosť: {{maxFilesize}}MiB.",
    dictResponseError: "Server odpovedal kódom {{statusCode}}.",
    success: function success(file, response) {
      $('form').append("<input type=\"hidden\" name=\"".concat(propName, "[]\" value=\"").concat(response.name, "\">"));
      uploadedDocumentMap[file.name] = response.name;
    },
    removedfile: function removedfile(file) {
      file.previewElement.remove();
      var name = '';

      if (typeof file.file_name !== 'undefined') {
        name = file.file_name;
      } else {
        name = uploadedDocumentMap[file.name];
      }

      $('form').find("input[name=\"".concat(propName, "[]\"][value=\"").concat(name, "\"]")).remove();
    },
    init: function init() {
      if (files) {
        for (var i in files) {
          var file = files[i];
          this.options.addedfile.call(this, file);
          this.options.thumbnail.call(this, file, file.original_url);
          file.previewElement.classList.add('dz-complete');
          $('form').append("<input type=\"hidden\" name=\"".concat(propName, "[]\" value=\"").concat(file.file_name, "\">"));
        }
      }
    }
  };
}
