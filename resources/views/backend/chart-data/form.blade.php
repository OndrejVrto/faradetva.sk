@php
    $controlerName = 'charts.data';
    $columns = 5;
    $uploadFiles = 'false';
    $linkActionCreate = route('charts.data.index', $chart->slug);
    $linkBack = route('charts.data.store', $chart->slug);

    $typeForm = $identificator = $linkActionEdit = $linkEdit = null;
    if ( isset( $data ) ) {
        $typeForm = 'edit';
        $identificator = $data->id;
        $linkEdit = route('charts.data.edit', ['chart' => $chart->slug, 'data' => $data->id]);
        $linkActionEdit = route('charts.data.update', ['chart' => $chart->slug, 'data' => $data->id]);
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"

    linkBack="{{ $linkBack }}"
    linkEdit="{{ $linkEdit }}"
    linkActionEdit="{{ $linkActionEdit }}"
    linkActionCreate="{{ $linkActionCreate }}"
    >

    <x-adminlte-input
        name="key"
        label="Parameter"
        enableOldSupport="true"
        value="{{ $data->key ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-chart-line"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input
        name="value"
        label="Hodnota grafu"
        enableOldSupport="true"
        value="{{ $data->value ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-scroll"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

</x-admin-form>
