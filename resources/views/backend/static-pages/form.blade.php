@php
    $controlerName = 'static-pages';
    $columns = 12;
    $uploadFiles = 'false';

    $typeForm = $identificatorEdit = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $page ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $page->id;
        $createdInfo = $page->createdInfo;
        $createdBy = $page->createdBy;
        $updatedInfo = $page->updatedInfo;
        $updatedBy = $page->updatedBy;
    }
@endphp

<x-admin-form controlerName="{{ $controlerName }}" columns="{{ $columns }}" typeForm="{{ $typeForm }}"
    files="{{ $uploadFiles }}" identificatorEdit="{{ $identificatorEdit }}"
    createdInfo="{{ $createdInfo }}"  createdBy="{{ $createdBy }}" updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}">

    <div class="form-row">

        <div class="col-xl-4">
            <x-adminlte-input
                name="title"
                label="Titulok záložky prehliadača"
                placeholder="Záložka prehliadača ..."
                enableOldSupport="true"
                value="{{ $page->title ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-font"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="col-xl-4">
            <x-adminlte-input
                name="header"
                label="Nadpis stránky"
                placeholder="Vlož nadpis stránky"
                enableOldSupport="true"
                value="{{ $page->header ?? '' }}" >
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
                placeholder="Vlož celé meno autora obsahu"
                enableOldSupport="true"
                value="{{ $page->author ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-font"></i>
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
                placeholder="Vlož url ..."
                enableOldSupport="true"
                value="{{ $page->url ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-font"></i>
                    </div>
                </x-slot>
                <x-slot name="noteSlot">
                    Štýl: snake-case Oddeľovač: spätné lomítko Jazyk: Slovenčina (napr: o-nas/duchovne-povolania)
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="col-xl-6">
            <x-adminlte-input
                name="route_name"
                label="Vnútorná cesta Laravel-u k šablone (route)"
                placeholder="Vlož route.name ..."
                enableOldSupport="true"
                value="{{ $page->route_name ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-font"></i>
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
                placeholder="Jedna rozvinutá veta."
                enableOldSupport="true"
                value="{{ $page->description ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-font"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="col-xl-6">
            <x-adminlte-input
                name="keywords"
                label="Kľúčové slová"
                placeholder="Vlož slová súvisiace s obsahom oddelené čiarkou"
                enableOldSupport="true"
                value="{{ $page->keywords ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-font"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

    </div>

</x-admin-form>
