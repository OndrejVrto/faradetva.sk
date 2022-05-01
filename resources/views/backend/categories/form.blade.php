@php
    $controlerName = 'categories';
    $columns = 6;
    $uploadFiles = 'false';

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $category) ) {
        $typeForm = 'edit';
        $identificator = $category->slug;
        $createdInfo = $category->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $category->updated_at->format('d. m. Y \o H:i');
    }
@endphp

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <x-adminlte-input
        name="title"
        label="Názov kategórie"
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
        enableOldSupport="true"
        value="{{ $category->description ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-scroll"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

</x-backend.form>
