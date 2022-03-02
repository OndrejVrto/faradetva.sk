@php
    $controlerName = 'sliders';
    $columns = 6;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $slider) ) {
        $typeForm = 'edit';
        $identificator = $slider->id;
        $createdInfo = $slider->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $slider->updated_at->format('d. m. Y \o H:i');
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <div class="form-group">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby sa zobrazoval obrázok na stránke.">
            <input type="hidden" name="active" value="0">
            <input
                type="checkbox"
                name="active"
                class="custom-control-input"
                id="customSwitch3"
                value="1"
                {{ (( $slider->active ?? (old('active') === "0" ? 0 : 1) ) OR old('active', 0) === 1) ? 'checked' : '' }}
            >
            <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
        </div>
    </div>

    <x-adminlte-input
        fgroupClass="mb-1"
        name="heading_1"
        label="Myšlienka"
        placeholder="Prvý riadok ..."
        enableOldSupport="true"
        value="{{ $slider->heading_1 ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-dice-one"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input
        fgroupClass="mb-1"
        name="heading_2"
        placeholder="Druhý riadok ..."
        enableOldSupport="true"
        value="{{ $slider->heading_2 ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-dice-two"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input
        name="heading_3"
        placeholder="Tretí riadok ..."
        enableOldSupport="true"
        value="{{ $slider->heading_3 ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-dice-three"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input-file
        class="border-right-none"
        name="photo"
        label="Obrázok"
        accept=".jpg,.bmp,.png,.jpeg"
        {{-- placeholder="{{ $slider->media_file_name ?? 'Vložiť obrázok ...' }}"> --}}
        placeholder="{{ $slider->media_file_name ?? '' }}">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: veľkosť obrázka minimálne 1920x800 px.
        </x-slot>
    </x-adminlte-input-file>

</x-admin-form>
