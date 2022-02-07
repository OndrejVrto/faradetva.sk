@php
    $controlerName = 'banners';
    $columns = 7;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $banner ) ) {
        $typeForm = 'edit';
        $identificator = $banner->id;
        $createdInfo = $banner->createdInfo;
        $createdBy = $banner->createdBy;
        $updatedInfo = $banner->updatedInfo;
        $updatedBy = $banner->updatedBy;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
>

    <div class="form-group">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby sa zobrazoval banner na stránke.">
            <input
                type="checkbox"
                class="custom-control-input"
                id="customSwitch3"
                name="active"

                @if (!is_null(Session::get('banner_old_input_checkbox')))
                    {{ Session::get('banner_old_input_checkbox') == 1 ? 'checked' : '' }}
                @else
                    @if( isset($banner) )
                        {{ $banner->active == 1 ? 'checked' : '' }}
                    @else
                        checked
                    @endif
                @endif

            >
            <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
        </div>
    </div>

    <x-adminlte-input
        fgroupClass="mb-1"
        name="title"
        label="Názov"
        placeholder="Názov baneru ..."
        enableOldSupport="true"
        value="{{ $banner->title ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="far fa-flag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input-file
        class="border-right-none"
        name="photo"
        label="Obrázok"
        accept=".jpg,.bmp,.png,.jpeg"
        placeholder="{{ $banner->media_file_name ?? 'Vložiť obrázok ...' }}">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: veľkosť obrázka minimálne 1920x480 px.
        </x-slot>
    </x-adminlte-input-file>

</x-admin-form>

