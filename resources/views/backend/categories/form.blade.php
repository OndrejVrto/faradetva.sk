@php
    $controlerName = 'categories';
    $columns = 6;
    $uploadFiles = 'false';

    $typeForm = $identificator = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $category ) ) {
        $typeForm = 'edit';
        $identificator = $category->slug;
        $createdInfo = $category->createdInfo;
        $createdBy = $category->createdBy;
        $updatedInfo = $category->updatedInfo;
        $updatedBy = $category->updatedBy;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
>

    <x-adminlte-input
        name="title"
        label="Názov kategórie"
        {{-- placeholder="Názov kategórie ..." --}}
        enableOldSupport="true"
        value="{{ $category->title ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-stream"></i>
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
        label="Popis kategórie"
        {{-- placeholder="Popis ..." --}}
        enableOldSupport="true"
        value="{{ $category->description ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-scroll"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

</x-admin-form>
