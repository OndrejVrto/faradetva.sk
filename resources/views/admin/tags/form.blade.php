@php
    $controlerName = 'tags';
    $columns = 6;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $tag) ) {
        $typeForm = 'edit';
        $identificator = $tag->slug;
        $createdInfo = $tag->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $tag->updated_at->format('d. m. Y \o H:i');
    }
@endphp

<x-admin.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <x-adminlte-input
        name="title"
        label="Kľúčové slovo"
        enableOldSupport="true"
        value="{{ $tag->title ?? '' }}"
        >
        <x-slot:prependSlot>
            <div class="input-group-text bg-gradient-orange">
                <i class="fa-solid fa-tag"></i>
            </div>
        </x-slot>
        @error('slug')
            <x-slot:errorManual>
                {{ $errors->first('slug') }}
            </x-slot>
        @enderror
    </x-adminlte-input>

    <x-adminlte-input
        name="description"
        label="Stručný popis kľúčového slova"
        enableOldSupport="true"
        value="{{ $tag->description ?? '' }}"
        >
        <x-slot:prependSlot>
            <div class="input-group-text bg-gradient-orange">
                <i class="fa-solid fa-scroll"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

</x-admin.form>
