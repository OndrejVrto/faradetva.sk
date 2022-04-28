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

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <x-adminlte-input-file
        id="pokus"
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
    </x-adminlte-input-file>

    <div id="containter">
        <img id="croperElement">
    </div>

    <input name="photo_data" id="photo-data" type="text">
    <button id="crop" type="button">CROP</button>

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

<script @nonce>
    console.log('fff', document.getElementById('pokus'));

    function readFile(file) {
        const reader = new FileReader();

        reader.onload = (event) => {
            const img = document.createElement('img');
            img.onload = () => {
                const maxWidth = 1280;
                const maxHeight = 720;
                const originalRatio = img.width / img.height;

                let finalWidth = img.width;
                let finalHeight = img.height;

                if (img.width > maxWidth || img.height > maxHeight) {
                    if (originalRatio > maxWidth / maxHeight) {
                    finalWidth = maxWidth;
                    finalHeight = maxWidth / originalRatio;
                    } else {
                    finalWidth = maxHeight * originalRatio;
                    finalHeight = maxHeight;
                    }
                }

                const canvas = document.createElement('canvas');
                canvas.width = finalWidth;
                canvas.height = finalHeight;

                const ctx = canvas.getContext('2d');
                if (ctx) {
                    const imgX = document.createElement('image');
                    const img2 = document.getElementById('croperElement');
                    ctx.drawImage(imgX, 0, 0, finalWidth, finalHeight);

                    cropper = new Cropper(img2, {
                        aspectRatio: 1,
                        viewMode: 1,
                    });


                    $("body").on("click", "#crop", function() {
                        const canvas2 = cropper.getCroppedCanvas({
                            width: 160,
                            height: 160,
                        });
                        canvas2.toBlob(function(blob) {
                            url = URL.createObjectURL(blob);
                            const reader2 = new FileReader();
                            reader2.readAsDataURL(blob);
                            reader2.onloadend = function() {
                                var base64data = reader.result;
                                console.log('hotovo', reader.result);
                                document.getElementById('jozkodurko').value = reader.result;
                            }
                        });
                    })

                }
            };
            img.src = event.target?.result;
        };
        reader.readAsDataURL(file);

    }

    function handleFiles() {
        const file = this.files[0]; /* now you can work with the file list */
        readFile(file);
    }

    const inputElement = document.getElementById("pokus");
    inputElement.addEventListener("change", handleFiles, false);

</script>

@endpush