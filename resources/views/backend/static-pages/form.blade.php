@php
    $controlerName = 'static-pages';
    $columns = 12;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = $source = null;
    if ( isset( $staticPage) ) {
        $typeForm = 'edit';
        $identificator = $staticPage->slug;
        $createdInfo = $staticPage->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $staticPage->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $staticPage->getFirstMedia($staticPage->collectionName)->file_name ?? '';
        $source = $staticPage->source;
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
                name="author_page"
                label="Autor obsahu stránky"
                {{-- placeholder="Vlož celé meno autora obsahu" --}}
                enableOldSupport="true"
                value="{{ $staticPage->author_page ?? '' }}" >
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
            <x-adminlte-textarea
                {{-- fgroupClass="pb-4" --}}
                name="teaser"
                label="Krátky sumár stránky (teaser)"
                enableOldSupport="true"
                rows="9"
            >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                </x-slot>
                    {{ $staticPage->teaser ?? '' }}
            </x-adminlte-textarea>
        </div>

        <div class="col-xl-6">

            <x-adminlte-input
                name="description_page"
                label="Popis obsahu stránky"
                {{-- placeholder="Jedna rozvinutá veta." --}}
                enableOldSupport="true"
                value="{{ $staticPage->description_page ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-scroll"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

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

            <x-adminlte-input
                name="wikipedia"
                label="Link na referenčnú stránku wikipédie (URL)"
                {{-- placeholder="slová oddelené čiarkou" --}}
                enableOldSupport="true"
                value="{{ $staticPage->wikipedia ?? '' }}" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fab fa-wikipedia-w"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>

    </div>

    <hr class="bg-orange">

    <x-adminlte-input-file
        class="border-right-none"
        name="picture"
        label="Referenčný obrázok"
        accept=".jpg,.png,.jpeg,.gif"

        placeholder="{{ $media_file_name ?? '' }}">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: veľkosť obrázka minimálne 960x480 px.
        </x-slot>
    </x-adminlte-input-file>

    <x-backend.form.source :source="$source" />

    <hr class="bg-orange">

    <div class="form-group">
        <label>Bannery pre stránku</label>
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby mala stránka všetky bannery.">
            <input
                type="checkbox"
                class="custom-control-input"
                id="Switch3"
                name="all_banners"
            >
            <label class="custom-control-label" for="Switch3">Všetko</label>
        </div>
    </div>

    <div class="row pb-2 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">
        @foreach($banners as $banner)
            <div
                class="col text-break text-center py-2
                {{ in_array($banner->id, $selectedBanners) ? 'bg-gradient-orange' : '' }}"
            >
                {!! (string) $banner
                        ->getFirstMedia($banner->media[0]->collection_name)
                        ->img('crop-thumb', [
                            'class' => 'w-100 img-fluid pb-1',
                            'alt' => $banner->source->description,
                            'title' => $banner->title,
                        ])
                !!}
                <input type="checkbox"
                    name="banner[{{ $banner->id }}]"
                    value="{{ $banner->id }}"
                    class='d-inline banner m-2'
                    {{ in_array($banner->id, $selectedBanners)
                        ? 'checked'
                        : '' }}
                >
                {{ $banner->title }}
            </div>
        @endforeach
    </div>

</x-backend.form>

@push('js')
    <script @nonce type="text/javascript">
        $(document).ready(function() {
            $('[name="all_banners"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.banner'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.banner'), function() {
                        $(this).prop('checked',false);
                    });
                }
            });
        });
    </script>
@endpush
