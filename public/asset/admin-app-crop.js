function watchImageUploader(config) {
  /* config args: (int)minWidth, (int)minHeight, (bool)ratio, (int)maxSize,
                  (attributes) input, output, preview, cropperContainer, cropButton, cancelCropButton, lastFileLabel */
  var lastFileName = $(config.lastFileLabel).html();

  function setLabel() {
    $(config.lastFileLabel).html(lastFileName);
  }

  function cancelCroper(cropper) {
    cropper.destroy();
    $(config.modal).modal('hide');
    $(config.cropButton).unbind();
    $(config.cancelCropButton).unbind();
  }

  function showCropper(onDisplayed) {
    $(config.modal).modal('show');
    var firstOpen = true;
    $(config.modal).on('shown.bs.modal', function () {
      if (firstOpen) {
        firstOpen = false;
        onDisplayed();
      }
    });
  }

  function setToForm(base64, fileName) {
    $(config.output).val(base64);
    $(config.fileName).val(fileName);
    $(config.preview).attr("src", base64);
    $(config.input).val('');
    lastFileName = fileName;
  }

  function checkDimensions(img) {
    if (img.width < config.minWidth || img.height < config.minHeight) {
      alert('Obrázok má malé rozmery:\n\nŠírka najmenej ' + config.minWidth + 'px\nVýška najmenej ' + config.minHeight + 'px');
      return false;
    }

    return true;
  }

  function readFile(file) {
    var reader = new FileReader();

    reader.onload = function (event) {
      var _event$target;

      var img = document.createElement('img');

      img.onload = function () {
        if (!checkDimensions(img)) {
          setLabel();
          return;
        }

        showCropper(function () {
          var cropperEntryPoint = $(config.cropperContainer)[0];
          cropperEntryPoint.src = reader.result;
          var cropBoxData;
          var canvasData;
          cropper = new Cropper(cropperEntryPoint, {
            aspectRatio: config.ratio ? config.minWidth / config.minHeight : null,
            viewMode: 2,
            modal: true,
            center: true,
            zoomable: false,
            movable: false,
            rotatable: false,
            scalable: false,
            crop: function crop(event) {
              var width = event.detail.width;
              var height = event.detail.height;

              if (width < config.minWidth || height < config.minHeight) {
                cropper.setData({
                  width: Math.max(config.minWidth, width),
                  height: Math.max(config.minHeight, height)
                });
              }
            }
          });
          $(config.cancelCropButton).click(function () {
            cancelCroper(cropper);
            setLabel();
            return;
          });
          $(config.cropButton).click(function () {
            cropper.crop();
            var base64 = cropper.getCroppedCanvas({
              fillColor: '#fff'
            }).toDataURL(file.type);
            var cropped = document.createElement('img');

            cropped.onload = function () {
              var croppedSize = cropped.width * cropped.height;

              if (croppedSize > config.maxSize) {
                var reduction = Math.sqrt(croppedSize / config.maxSize);
                var finalWidth = cropped.width / reduction;
                var finalHeight = cropped.height / reduction;
                var canvas = document.createElement('canvas');
                canvas.width = finalWidth;
                canvas.height = finalHeight;
                var ctx = canvas.getContext('2d');

                if (ctx) {
                  ctx.drawImage(cropped, 0, 0, finalWidth, finalHeight);
                  setToForm(canvas.toDataURL(file.type), file.name);
                }
              } else {
                setToForm(base64, file.name);
              }

              cancelCroper(cropper);
              setLabel();
            };

            cropped.src = base64;
          });
        });
      };

      img.src = (_event$target = event.target) === null || _event$target === void 0 ? void 0 : _event$target.result;
    };

    reader.readAsDataURL(file);
  }

  $(config.input).on('change', function (e) {
    readFile($(config.input)[0].files[0]);
  });
}
