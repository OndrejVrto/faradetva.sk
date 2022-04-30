@php
    $controlerName = 'banners';
    $columns = 11;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = $source = null;
    if ( isset( $banner ) ) {
        $typeForm = 'edit';
        $identificator = $banner->slug;
        $createdInfo = $banner->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $banner->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $banner->getFirstMedia($banner->collectionName)->file_name ?? '';
        $source = $banner->source;
    }
@endphp

<style>
    .container > * {
        height: 500px;
        max-height: 500px;
    }
    .container img {
        margin: auto;
        object-fit: scale-down;
        margin-bottom: 15px;
    }
    .upload-area {
        border: 5px dotted #dadada;
        height: 500px;
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
        padding: 10px;
    }
</style>

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <!-- <x-adminlte-input-file
        class="border-right-none"
        name="photox"
        label="Obrázok"
        placeholder="{{ $media_file_name }}"
        accept=".jpg,.bmp,.png,.jpeg"
    >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: veľkosť obrázka minimálne 1920x480 px.
        </x-slot>
    </x-adminlte-input-file> -->


    <!-- toto je container kde ma fungovat cropper -->
    <div class="container">
        <img id="cropperElement" class="d-none">
    </div>

    <!-- toto je button na vytvorenie cropu -->
    <div class="crop-container">
        <button id="cropButton" type="button" class="btn bg-gradient-success d-none">Orezat</button>
    </div>

    <!-- toto je preview container toho co sa prave nahrava -->
    <div class="container">
        <img id="preview" class="d-none">
    </div>

    <!-- toto je vstupny input pre subor -->
    <label for="uploadFileInput" class="upload-area" id="uploadFileContainer">
        <input id="uploadFileInput" name="upload-file" type=file>
    </label>

    <!-- toto je hidden input field kde sa ulozi finalna base64 -->
    <input id="photo-base64" name="photo-base64" type="text" hidden>

    <x-adminlte-input
        fgroupClass="pb-4"
        name="title"
        label="Názov"
        {{-- placeholder="Názov baneru ..." --}}
        enableOldSupport="true"
        value="{{ $banner->title ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="far fa-flag"></i>
            </div>
        </x-slot>
        @error('slug')
            <x-slot name="errorManual">
                {{ $errors->first('slug') }}
            </x-slot>
        @enderror
    </x-adminlte-input>

    <x-backend.form.source :source="$source" />

    <hr class="bg-orange">

    <div class="form-group">
        <label>Stránky v ktorých sa bude zobrazovať tento banner</label>
    </div>

    <div class="row pb-2 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">
        @foreach($pages as $page)
            <div class="col text-break" title="{{ $page->description }}">
                <input type="checkbox"
                    name="page[{{ $page->id }}]"
                    value="{{ $page->id }}"
                    class='d-inline m-2'
                    {{ in_array($page->id, $selectedPages)
                        ? 'checked'
                        : '' }}
                >
                {{ $page->title }}
            </div>
        @endforeach
    </div>

</x-backend.form>

@push('js')

<script @nonce src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.js"></script>
<link @nonce href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet"> 

<!-- tento skript definuje to co je potrebne a mozes si ho vytiahnut do suboru -->
<script @nonce>
    // config args: minWidth, minHeight, ratio, maxSize, input, output, preview, cropperContainer, cropButton
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

                    cropper = new Cropper(cropperEntryPoint, {
                        aspectRatio: config.ratio,
                        viewMode: 1,
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

        // nasledujuce tri JQuery by mali handlovat aj drop file ale dnes mi nejak blbne chrome takze to neviem otestovat
        // kludne zmaz ked ti to nepojde a nechces to

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

<!-- tento skript tu ostane ako konkretne volanie funkcie -->
<script @nonce>
    watchImageUploader({
        minWidth: 1000,
        minHeight: 500,
        ratio: 2,
        maxSize: 1024*768,
        input: '#uploadFileInput',
        inputContainer: '#uploadFileContainer',
        output: '#photo-base64',
        preview: '#preview',
        cropperContainer: '#cropperElement',
        cropButton: '#cropButton'
    });
</script>

@endpush