@props([
    'label'           => "Obrázok",
    'minWidth'        => "480",
    'minHeight'       => "1920",
    'ratio'           => "true",
    'maxSize'         => "2600*1600",
    'media_file_name' => null,
])
<!--  Component: CROP - Start -->
    {{-- toto je vstupny input pre subor --}}
    <x-adminlte-input-file
        class="border-right-none"
        name="upload_crop_file"
        id="upload-corp-file-input"
        label="{{ $label }}"
        placeholder="{{ old('crop_file_name', (empty($media_file_name) ? '' : $media_file_name->getCustomProperty('oldFileName'))) }}"
        accept=".jpg,.bmp,.png,.jpeg,.tiff"
    >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámky: Veľkosť obrázka minimálne {{ $minWidth }}x{{ $minHeight }} px. @if ($ratio == 'true')Pomer strán je uzamknutý.@endif
        </x-slot>
        @error('crop_base64_output')
            <x-slot name="errorManual">
                {{ $errors->first('crop_base64_output') }}
            </x-slot>
        @enderror
        @error('crop_file_name')
            <x-slot name="errorManual">
                {{ $errors->first('crop_file_name') }}
            </x-slot>
        @enderror
    </x-adminlte-input-file>

    {{-- toto je hidden input field kde sa ulozi finalna base64 --}}
    <input id="crop_base64_output" name="crop_base64_output" type="text" value="{{ old('crop_base64_output') }}" hidden>

    {{-- toto je hidden input field kde sa ulozi názov pôvodného súboru --}}
    <input id="crop_file_name" name="crop_file_name" type="text" value="{{ old('crop_file_name') }}" hidden>

    {{-- toto je preview container toho co sa prave nahrava --}}
    <div class="form-group ">
        {{-- <label for="title">Náhľad</label> --}}
        <div class="preview-container">
            <img id="crop_preview" src="{{ old('crop_base64_output', empty($media_file_name) ? '' : $media_file_name->getFullUrl()) }}" alt="Po vložení obrázka tu bude zobrazený náhľad.">
        </div>
    </div>

    {{-- toto je modálne okno pre zobrazenie croppera --}}
    <div class="modal fade" id="crop_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered crop-modal">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- toto je container kde ma fungovat cropper --}}
                    <div class="crop-container">
                        <img id="cropper_element">
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- toto je button na vytvorenie cropu --}}
                    <button id="crop_button" type="button" class="btn bg-gradient-orange px-5 mr-2">
                        <i class="fa-solid fa-crop-simple mr-1"></i>
                        Orezať
                    </button>
                    {{-- toto je button cancel --}}
                    <button id="crop_cancel_button" type="button" class="btn bg-gradient-danger px-5">
                        <i class="fa-solid fa-ban mr-1"></i>
                        Zrušiť
                    </button>
                </div>
            </div>
        </div>
    </div>
<!--  Component: CROP - End -->

@push('css')
    <link @nonce rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" >
    <style>
        .preview-container img {
            max-height: 300px;
            object-fit: scale-down;
            width: 100%;
        }
        .crop-modal{
            position: relative;
            width: 2000px;
            max-width: 80vw;
        }
        .crop-container {
            position: relative;
            max-height: 80vh;
            min-height: 80vh;
            max-width: 100%;
        }
    </style>
@endpush

@push('js')
    {{-- tento skript tu ostane ako konkretne volanie funkcie --}}
    <script @nonce>
        watchImageUploader({
            minWidth        : {{ $minWidth }},
            minHeight       : {{ $minHeight }},
            ratio           : {{ $ratio }},
            maxSize         : {{ $maxSize }},
            input           : '#upload-corp-file-input',
            output          : '#crop_base64_output',
            fileName        : '#crop_file_name',
            preview         : '#crop_preview',
            modal           : '#crop_modal',
            cropperContainer: '#cropper_element',
            cropButton      : '#crop_button',
            cancelCropButton: '#crop_cancel_button',
            lastFileLabel   : 'label[class~="custom-file-label"][for="upload-corp-file-input"]',
        });
    </script>
@endpush

@prepend('js')
    <script @nonce src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- tento skript definuje to co je potrebne a mozes si ho vytiahnut do suboru --}}
    <script @nonce>
        /* config args: (int)minWidth, (int)minHeight, (bool)ratio, (int)maxSize, (id) input, output, preview, cropperContainer, cropButton, cancelCropButton */
        function watchImageUploader(config) {

            let lastFileName = $(config.lastFileLabel).html();

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
                lastFileName = fileName;
            }

            function checkDimensions(img) {
                if (img.width < config.minWidth || img.height < config.minHeight) {
                    alert('Obrázok má malé rozmery:\n\nŠírka najmenej '+ config.minWidth +'px\nVýška najmenej '+ config.minHeight +'px');
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
                                aspectRatio: config.ratio ? config.minWidth / config.minHeight : null,
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
                                        width < config.minWidth
                                        || height < config.minHeight
                                    ) {
                                        cropper.setData({
                                            width: Math.max(config.minWidth, width),
                                            height: Math.max(config.minHeight, height),
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
                readFile($(config.input)[0].files[0]);
            });
        }
    </script>
@endprepend
