@php
    $controlerName = 'day-ideas';
    $columns = 6;
    $uploadFiles = 'false';

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $dayIdea) ) {
        $typeForm = 'edit';
        $identificator = $dayIdea->id;
        $createdInfo = $dayIdea->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $dayIdea->updated_at->format('d. m. Y \o H:i');
    }
@endphp

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <x-adminlte-input
        name="author"
        label="Autor citátu"
        {{-- placeholder="Jediné slovo" --}}
        enableOldSupport="true"
        value="{{ $dayIdea->author ?? '' }}"
    >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-user-edit"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input
        name="idea"
        label="Citát alebo myšlienka"
        enableOldSupport="true"
        value="{{ $dayIdea->idea ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="far fa-lightbulb fa-lg"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

</x-backend.form>
