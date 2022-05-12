function watchImageUploader(config) {
    /* config args: (int)minWidth, (int)minHeight, (bool)ratio, (int)maxSize,
                    (attributes) input, output, preview, cropperContainer, cropButton, cancelCropButton, lastFileLabel */

    let lastFileName = $(config.lastFileLabel).html();
    let minWidth = 50;
    let minHeight = 50;
    let ratio = false;

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
        let firstOpen = true;
        $(config.modal).on('shown.bs.modal', () => {
            if (firstOpen) {
                firstOpen = false;
                onDisplayed();
            }
        });
    }

    function setToForm(base64, fileName) {
        $(config.output).val(base64);
        $(config.fileName).val(fileName);
        $(config.preview).attr("src", (base64));
        $(config.input).val('');

        if(ratio){
            $(config.minWidth).val(minWidth);
            $(config.minHeight).val(minHeight);
            $(config.ratio).val('1');
        }

        lastFileName = fileName;
    }

    function checkDimensions(img) {
        if (img.width < minWidth || img.height < minHeight) {
            alert('Obrázok má malé rozmery:\n\nŠírka najmenej '+ minWidth +'px\nVýška najmenej '+ minHeight +'px');
            return false;
        }
        return true;
    }

    function readFile(file) {
        const reader = new FileReader();

        reader.onload = (event) => {
            const img = document.createElement('img');

            img.onload = () => {

                if (!checkDimensions(img)) {
                    setLabel();
                    return;
                }

                showCropper(() => {
                    const cropperEntryPoint = $(config.cropperContainer)[0];

                    cropperEntryPoint.src = reader.result;

                    var cropBoxData;
                    var canvasData;

                    cropper = new Cropper(cropperEntryPoint, {
                        aspectRatio: ratio ? minWidth / minHeight : null,
                        viewMode: 2,
                        modal: true,
                        center: true,
                        zoomable: false,
                        movable: false,
                        rotatable: false,
                        scalable: false,

                        crop: function (event) {
                            var width = event.detail.width;
                            var height = event.detail.height;

                            if (
                                width < minWidth
                                || height < minHeight
                            ) {
                                cropper.setData({
                                    width: Math.max(minWidth, width),
                                    height: Math.max(minHeight, height),
                                });
                            }
                        },

                    });

                    $(config.cancelCropButton).click(() => {
                        cancelCroper(cropper);
                        setLabel();
                        return;
                    });

                    $(config.cropButton).click(() => {
                        cropper.crop();

                        const base64 = cropper.getCroppedCanvas({fillColor: '#fff'})
                            .toDataURL(file.type);

                        const cropped = document.createElement('img');

                        cropped.onload = () => {
                            const croppedSize = cropped.width * cropped.height;

                            if (croppedSize > config.maxSize) {
                                const reduction = Math.sqrt(croppedSize / config.maxSize);
                                const finalWidth = cropped.width / reduction;
                                const finalHeight = cropped.height / reduction;

                                const canvas = document.createElement('canvas');
                                canvas.width = finalWidth;
                                canvas.height = finalHeight;

                                const ctx = canvas.getContext('2d');

                                if (ctx) {
                                    ctx.drawImage(cropped, 0, 0, finalWidth, finalHeight);
                                    setToForm(canvas.toDataURL(file.type), file.name);
                                }
                            } else {
                                setToForm(base64, file.name);
                            }

                            cancelCroper(cropper);
                            setLabel();
                        }

                        cropped.src = base64;
                    });
                });
            };

            img.src = event.target?.result;
        };

        reader.readAsDataURL(file);
    }

    $(config.input).on('change', (e) => {

        if( $(config.minWidth).val() ) {
            minWidth = parseInt($(config.minWidth).val());
        };

        if( $(config.minHeight).val() ) {
            minHeight = parseInt($(config.minHeight).val());
        };

        ratio = $(config.ratio).prop('checked');

        readFile($(config.input)[0].files[0]);
    });
}
