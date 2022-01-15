@php
    $controlerName = 'tags';
    $columns = 6;
    $uploadFiles = 'true';

    $typeForm = $identificatorEdit = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $tag ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $tag->slug;
        $createdInfo = $tag->createdInfo;
        $createdBy = $tag->createdBy;
        $updatedInfo = $tag->updatedInfo;
        $updatedBy = $tag->updatedBy;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificatorEdit="{{ $identificatorEdit }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
>

    <x-adminlte-input
        name="title"
        label="Kľúčové slovo"
        {{-- placeholder="Jediné slovo" --}}
        enableOldSupport="true"
        value="{{ $tag->title ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-tag"></i>
            </div>
        </x-slot>
        @error('slug')
            <x-slot name="errorManual">
                {{ $errors->first('slug') }}
            </x-slot>
        @enderror
    </x-adminlte-input>

    <x-adminlte-input
        name="description"
        label="Stručný popis kľúčového slova"
        {{-- placeholder="Stručný popis ..." --}}
        enableOldSupport="true"
        value="{{ $tag->description ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-scroll"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

</x-admin-form>
