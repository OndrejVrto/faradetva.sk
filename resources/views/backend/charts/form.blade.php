@php
    $controlerName = 'charts';
    $columns = 6;
    $uploadFiles = 'false';

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $chart ) ) {
        $typeForm = 'edit';
        $identificator = $chart->slug;
        $createdInfo = $chart->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $chart->updated_at->format('d. m. Y \o H:i');
    }
@endphp

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <div class="form-group">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby sa zobrazoval graf na stránke.">
            <input type="hidden" name="active" value="0">
            <input
                type="checkbox"
                name="active"
                class="custom-control-input"
                id="customSwitch3"
                value="1"
                {{ (( $chart->active ?? (old('active') === "0" ? 0 : 1) ) OR old('active', 0) === 1) ? 'checked' : '' }}
            >
            <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
        </div>
    </div>

    <x-adminlte-input
        name="title"
        label="Názov grafu"
        enableOldSupport="true"
        value="{{ $chart->title ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-chart-line"></i>
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
        label="Popis grafu"
        enableOldSupport="true"
        value="{{ $chart->description ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-scroll"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-select2
        name="type_chart"
        label="Typ grafu"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="far fa-chart-bar"></i>
            </div>
        </x-slot>
        <option/>
            @foreach($chartTypes as $chartType)
                <option
                    value="{{ $chartType->value }}"
                    title="{{ $chartType->typeLocalize() }}"
                    @if( $chartType->value == ($chart->type_chart->value ?? '') OR $chartType->value == old('type_chart'))
                        selected
                    @endif
                    >
                    {{ $chartType->typeLocalize() }}
                </option>
            @endforeach
    </x-adminlte-select2>

    <x-adminlte-input
        name="name_x_axis"
        label="Názov vodorovnej osi"
        enableOldSupport="true"
        value="{{ $chart->name_x_axis ?? 'Rok' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-arrows-alt-h"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input
        name="name_y_axis"
        label="Názov zvislej osi"
        enableOldSupport="true"
        value="{{ $chart->name_y_axis ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-arrows-alt-v mx-1"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input
        name="color"
        type="color"
        label="Farba grafu"
        enableOldSupport="true"
        value="{{ $chart->color ?? '#ff7b33' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-palette"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: Základná farba stránky je #FF7B33 alebo rgb(255,123,51)
        </x-slot>
    </x-adminlte-input>

</x-backend.form>
