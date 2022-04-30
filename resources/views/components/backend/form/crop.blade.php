@props([
    'minWidth'  => "480",
    'minHeight' => "1920",
    'ratio'     => "true",
    'maxSize'   => "2600*1600",
])
<!--  Component: CROP - Start -->
{{-- toto je container kde ma fungovat cropper --}}
<div class="preview-container">
    <img id="cropperElement" class="d-none">
</div>

{{-- toto je button na vytvorenie cropu --}}
<div class="crop-container">
    <button id="cropButton" type="button" class="btn bg-gradient-warning d-none">
        Orezať
    </button>
</div>

{{-- toto je preview container toho co sa prave nahrava --}}
<div class="preview-container">
    <img id="preview" class="d-none">
</div>

{{-- toto je vstupny input pre subor --}}
<label for="uploadFileInput" class="upload-area" id="uploadFileContainer">
    <input id="uploadFileInput" name="upload-file" type=file>
</label>

{{-- toto je hidden input field kde sa ulozi finalna base64 --}}
<input id="photo-base64" name="photo-base64" type="text" hidden>
<!--  Component: CROP - End -->

@push('js')
    {{-- tento skript tu ostane ako konkretne volanie funkcie --}}
    <script @nonce>
        watchImageUploader({
            minWidth: {{ $minWidth }},
            minHeight: {{ $minHeight }},
            ratio: {{ $ratio }},
            maxSize: {{ $maxSize }},
            input: '#uploadFileInput',
            inputContainer: '#uploadFileContainer',
            output: '#photo-base64',
            preview: '#preview',
            cropperContainer: '#cropperElement',
            cropButton: '#cropButton'
        });
    </script>
@endpush

@prepend('js')
    <script @nonce src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.js"></script>

    {{-- tento skript definuje to co je potrebne a mozes si ho vytiahnut do suboru --}}
    <script @nonce>
        /* config args: minWidth, minHeight, ratio, maxSize, input, output, preview, cropperContainer, cropButton */
        function watchImageUploader(config) {
    
            function showResult() {
                $(config.cropButton).addClass('d-none');
                $(config.cropperContainer).addClass('d-none');
                $(config.preview).removeClass('d-none');
            }
    
            function showCropper() {
                $(config.input).addClass('d-none');
                $(config.inputContainer).addClass('d-none');
                $(config.cropButton).removeClass('d-none');
                $(config.cropperContainer).removeClass('d-none');
            }
    
            function setToForm(base64) {
                $(config.output).val(base64);
                $(config.preview).attr("src", (base64));
                showResult();
            }
    
            function checkDimensions(img) {
                if (img.width < config.minWidth || img.height < config.minHeight) {
                    alert('Obrazok nesplna minimalne rozmery');
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
                            return;
                        }
    
                        showCropper();
    
                        const cropperEntryPoint = $(config.cropperContainer)[0];
    
                        cropperEntryPoint.src = reader.result;
    
                        if(config.ratio == true) {
                            ratio = config.minWidth / config.minHeight;
                        } else {
                            ratio = null;
                        }
    
                        cropper = new Cropper(cropperEntryPoint, {
                            aspectRatio: ratio,
                            viewMode: 1,
                            zoomable: false,
                            movable: false,
                            rotatable: false,
                            scalable: false,
                            
                            data: {
                                width: config.minWidth,
                                height: config.minHeight,
                            },
    
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
    
                        $(config.cropButton).click(() => {
                            cropper.crop();
    
                            const base64 = cropper.getCroppedCanvas({fillColor: '#fff'})
                                .toDataURL(file.type);
    
                            const cropped = document.createElement('img');
    
                            cropped.onload = () => {
                                if (!checkDimensions(cropped)) {
                                    return;
                                }
    
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
                                        setToForm(canvas.toDataURL(file.type));
                                    }
    
                                } else {
                                    setToForm(base64);
                                }
    
                                cropper.destroy();
                            }
    
                            cropped.src = base64;
    
                        });
                    };
    
                    img.src = event.target?.result;
                };
    
                reader.readAsDataURL(file);
            }
    
            $(config.input).on('change', (e) => {
                readFile($(config.input)[0].files[0]);
            });
    
            /* nasledujuce tri JQuery by mali handlovat aj drop file ale dnes mi nejak blbne chrome takze to neviem otestovat */
            /* kludne zmaz ked ti to nepojde a nechces to */
    
            $(config.inputContainer).on(
                'dragover',
                function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            );
    
            $(config.inputContainer).on(
                'dragenter',
                function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            );
    
            $(config.inputContainer).on(
                'drop',
                function(e){
                    if (e.originalEvent.dataTransfer && e.originalEvent.dataTransfer.files.length) {
                        e.preventDefault();
                        e.stopPropagation();
                        /*UPLOAD FILES HERE*/
                        readFile(e.originalEvent.dataTransfer.files[0]);
                    }
                }
            );
        }
    
    </script>
@endprepend

@push('css')
    <link @nonce href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet"> 
    <style>
        .preview-container > * {
            margin: 20px auto;
            /* height: 500px; */
            max-height: 300px;
        }
        .preview-container img {
            margin: auto;
            object-fit: scale-down;
            width: 100%;
            margin-bottom: 15px;
        }
        .upload-area {
            border: 5px dotted #dadada;
            height: 100px;
            width: 100%;
            border-radius: 10px;
            display: flex;
            cursor: pointer;
        }
        .upload-area input {
            margin: auto;
        }
        .crop-container {
            display: flex;
            justify-content: center;
            padding: 0px;
        }
    </style>
@endpush