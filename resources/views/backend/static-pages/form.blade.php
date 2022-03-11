@php
    $controlerName = 'static-pages';
    $columns = 12;
    $uploadFiles = 'false';

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $staticPage) ) {
        $typeForm = 'edit';
        $identificator = $staticPage->slug;
        $createdInfo = $staticPage->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $staticPage->updated_at->format('d. m. Y \o H:i');
    }
@endphp

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <div class="form-row">

        <div class="col-xl-4">
            <x-adminlte-input
                name="title"
                label="Titulok záložky prehliadača"
                {{-- placeholder="Záložka prehliadača ..." --}}
                enableOldSupport="true"
                value="{{ $staticPage->title ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fab fa-pagelines fa-lg"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="col-xl-4">
            <x-adminlte-input
                name="header"
                label="Nadpis stránky"
                {{-- placeholder="Vlož nadpis stránky" --}}
                enableOldSupport="true"
                value="{{ $staticPage->header ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-font"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="col-xl-4">
            <x-adminlte-input
                name="author"
                label="Autor obsahu stránky"
                {{-- placeholder="Vlož celé meno autora obsahu" --}}
                enableOldSupport="true"
                value="{{ $staticPage->author ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-user-astronaut fa-lg"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

    </div>

    <div class="form-row">

        <div class="col-xl-6">
            <x-adminlte-input
                name="url"
                label="URL adresa ktorú uvidí uživateľ"
                {{-- placeholder="Vlož url ..." --}}
                enableOldSupport="true"
                value="{{ $staticPage->url ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-road"></i>
                    </div>
                </x-slot>
                <x-slot name="noteSlot">
                    Maximálne 3x lomítko Štýl: snake-case Oddeľovač: spätné lomítko Jazyk: Slovenčina (napr: o-nas/duchovne-povolania)
                </x-slot>
                @error('slug')
                    <x-slot name="errorManual">
                        {{ $errors->first('slug') }}
                    </x-slot>
                @enderror
            </x-adminlte-input>
        </div>

        <div class="col-xl-6">
            <x-adminlte-input
                name="route_name"
                label="Vnútorná cesta Laravel-u k šablone (route)"
                {{-- placeholder="Vlož route.name ..." --}}
                enableOldSupport="true"
                value="{{ $staticPage->route_name ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-route"></i>
                    </div>
                </x-slot>
                <x-slot name="noteSlot">
                    Štýl: snake-case Oddeľovač: bodka Jazyk: angličtina (napr: about.spiritual-vocations )
                </x-slot>
            </x-adminlte-input>
        </div>

    </div>

    <div class="form-row">

        <div class="col-xl-6">
            <x-adminlte-input
                name="description"
                label="Popis obsahu stránky"
                {{-- placeholder="Jedna rozvinutá veta." --}}
                enableOldSupport="true"
                value="{{ $staticPage->description ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-scroll"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="col-xl-6">
            <x-adminlte-input
                name="keywords"
                label="Kľúčové slová"
                {{-- placeholder="slová oddelené čiarkou" --}}
                enableOldSupport="true"
                value="{{ $staticPage->keywords ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-keyboard fa-lg"></i>
                    </div>
                </x-slot>
                <x-slot name="noteSlot">
                    Slová alebo slovné spojenia oddelené čiarkou
                </x-slot>
            </x-adminlte-input>
        </div>

    </div>

</x-backend.form>
