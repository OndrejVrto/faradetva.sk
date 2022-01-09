@php
    $controlerName = 'banners';
    $columns = 7;
    $upload_files = 'true';

    $typeForm = $identificatorEdit = $created_info = $created_by = $updated_info = $updated_by = null;
    if ( isset( $banner ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $banner->id;
        $created_info = $banner->created_info;
        $created_by = $banner->created_by;
        $updated_info = $banner->updated_info;
        $updated_by = $banner->updated_by;
    }
@endphp

<x-admin-form     controlerName="{{ $controlerName }}" columns="{{ $columns }}" typeForm="{{ $typeForm }}" files="{{ $upload_files }}" identificatorEdit="{{ $identificatorEdit }}"
                createdInfo="{{ $created_info }}"  createdBy="{{ $created_by }}" updatedInfo="{{ $updated_info }}" updatedBy="{{ $updated_by }}">

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

