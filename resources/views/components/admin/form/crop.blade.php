@props([
    'label'            => "Obrázok",
    'minWidth'         => null,
    'minHeight'        => null,
    'sizeButton'       => false,
    'ratio'            => 'true',
    'lock'             => true,
    'maxSize'          => "2600*1600",
    'media_file_name'  => null,
    'exact_dimensions' => null,
])
<!--  Component: CROP - Start -->

{{--! OUTPUT FIELDS --}}
    {{-- This is hidden input field where is stored final string base64 --}}
    <input id="crop_output_base64" name="crop_output_base64" type="text" value="{{ old('crop_output_base64') }}" hidden>
    {{-- This is hidden input field where is stored orginal file name string --}}
    <input id="crop_output_file_name" name="crop_output_file_name" type="text" value="{{ old('crop_output_file_name') }}" >
    {{-- This is  input fields where is stored picture sizes --}}
    <input id="crop_output_width" name="crop_output_width" value="{{ old('crop_output_width') }}" >
    <input id="crop_output_height" name="crop_output_height" value="{{ old('crop_output_height') }}" >
    <input id="crop_output_exact_dimensions" name="crop_output_exact_dimensions" value="{{ old('crop_output_exact_dimensions') }}" >


{{--! INPUT FIELDS --}}
    {{-- This is input field for File --}}
    <div class="form-group">
        <label for="crop_input_file">{{ $label }}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text bg-gradient-orange">
                    <i class="fas fa-file-import"></i>
                </div>
            </div>

            <div class="custom-file">
                <input
                    type="file"
                    id="crop_input_file"
                    class="custom-file-input border-right-none"
                    accept=".jpg,.bmp,.png,.jpeg,.tiff,.svg"
                >
                <label class="custom-file-label text-truncate" for="crop_input_file">
                    {{ old('crop_output_file_name', (empty($media_file_name) ? '' : $media_file_name->getCustomProperty('oldFileName'))) }}
                </label>
            </div>

            {{-- this is checkbox for enable exact size drawing --}}
            @if($sizeButton === true)
                <div class="input-group-append">
                    <div class="input-group-text bg-gradient-orange">
                        <input
                            type="checkbox"
                            id="crop_input_exact_dimensions"
                            name="crop_input_exact_dimensions"
                            value="0"
                            @checked( old('crop_input_exact_dimensions', $exact_dimensions) )
                        >
                        <span class="ml-1">Presné rozmery</span>
                    </div>
                </div>
            @else
                <input id="crop_input_exact_dimensions" value="0" hidden>
            @endif
        </div>

        <span class="invalid-feedback d-block" role="alert">
            <strong>
                @error('crop_exact_dimensions')
                    {{ $errors->first('crop_output_exact_dimensions') }}
                @enderror
                @error('crop_output_base64')
                    {{ $errors->first('crop_output_base64') }}
                @enderror
                @error('crop_output_file_name')
                    {{ $errors->first('crop_output_file_name') }}
                @enderror
            </strong>
        </span>
    </div>

    <div class="form-row">
        <div class="col-md-6">

            {{-- min. width --}}
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-gradient-orange">
                            <i class="fa-solid fa-arrows-left-right"></i>
                        </div>
                    </div>
                    <input
                        id="crop_input_width"
                        name="crop_input_width"
                        value="{{ old('crop_input_width', $minWidth ?? '50') }}"
                        class="form-control"
                        type="number"
                        min="{{ old('crop_input_width', $minWidth ?? '50') }}"
                        max="2600"
                        @if($lock)
                            disabled
                        @endif
                    >
                </div>
                @error('crop_output_width')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('crop_output_width') }}</strong>
                    </span>
                @enderror
            </div>

        </div>
        <div class="col-md-6">

            {{-- min. height --}}
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-gradient-orange">
                            <i class="fa-solid fa-arrows-up-down"></i>
                        </div>
                    </div>
                    <input
                        id="crop_input_height"
                        name="crop_input_height"
                        value="{{ old('crop_input_height', $minHeight ?? '50') }}"
                        class="form-control"
                        type="number"
                        min="{{ old('crop_input_height', $minHeight ?? '50') }}"
                        max="2600"
                        @if($lock)
                            disabled
                        @endif
                    >
                </div>
                @error('crop_output_height')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('crop_output_height') }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>


{{--! WORK FIELDS --}}
    {{-- This is preview container --}}
    <div class="form-group">
        <div class="preview-container">
            <img id="crop_work_preview" src="{{ old('crop_output_base64', empty($media_file_name) ? '' : $media_file_name->getFullUrl()) }}" alt="Po vložení obrázka tu bude zobrazený náhľad.">
        </div>
    </div>

    {{-- This is modal window for cropper --}}
    <div class="modal fade" id="crop_work_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered crop-modal">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- container for cropper --}}
                    <div class="crop-container">
                        <img id="crop_work_element">
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- button to create croped image --}}
                    <button id="crop_work_button" type="button" class="btn bg-gradient-orange px-5 mr-2">
                        <i class="fa-solid fa-crop-simple mr-1"></i>
                        Orezať
                    </button>
                    {{-- cancel button --}}
                    <button id="crop_work_cancel_button" type="button" class="btn bg-gradient-danger px-5">
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
    <script @nonce src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/admin-app-crop.js'), true) }}"></script>
    <script @nonce>
        watchImageUploader({
            /** INPUT fields */
            input           : '#crop_input_file',
            minWidth        : '#crop_input_width',
            minHeight       : '#crop_input_height',
            exactDimensions : '#crop_input_exact_dimensions',

            /** OUTPUT fields */
            output          : '#crop_output_base64',
            outputFileName  : '#crop_output_file_name',
            outputRatio     : '#crop_output_exact_dimensions',
            outputWidth     : '#crop_output_width',
            outputHeight    : '#crop_output_height',
            lastFileLabel   : 'label[class~="custom-file-label"][for="crop_input_file"]',

            /** WORK fields */
            preview         : '#crop_work_preview',
            modal           : '#crop_work_modal',
            cropperContainer: '#crop_work_element',
            cropButton      : '#crop_work_button',
            cancelCropButton: '#crop_work_cancel_button',

            /** CUSTOM config*/
            ratio           : {{ $ratio }},
            maxSize         : {{ $maxSize }},
        });
    </script>
@endpush
