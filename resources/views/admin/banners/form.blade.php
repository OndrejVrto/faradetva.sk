@php
    $controlerName = 'banners';
    $columns = 12;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = $source = null;
    if ( isset( $banner ) ) {
        $typeForm = 'edit';
        $identificator = $banner->slug;
        $createdInfo = $banner->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $banner->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $banner->getFirstMedia($banner->collectionName) ?? '';
        $source = $banner->source;
    }
@endphp

<x-admin.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <div class="form-row">
        <div class="col-xl-6">

            <x-admin.form.crop label="Obrázok pre banner" minWidth="1920" minHeight="480" :media_file_name="$media_file_name" />

        </div>

        <div class="col-xl-6">
            <hr class="d-xl-none bg-orange mt-4">

            <x-adminlte-input
                fgroupClass=""
                name="title"
                label="Názov"

                enableOldSupport="true"
                value="{{ $banner->title ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-regular fa-flag"></i>
                    </div>
                </x-slot>
                @error('slug')
                    <x-slot:errorManual>
                        {{ $errors->first('slug') }}
                    </x-slot>
                @enderror
            </x-adminlte-input>

            <hr class="d-xl-none bg-orange mt-4">

            <x-admin.form.source :source="$source" />
        </div>
    </div>

    <hr class="bg-orange">

    <div class="form-group">
        <label>Stránky v ktorých sa bude zobrazovať tento banner</label>
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby bol banner na všetkých stránkach.">
            <input
                type="checkbox"
                class="custom-control-input"
                id="Switch3"
                name="all_pages"
            >
            <label class="custom-control-label" for="Switch3">Všetko</label>
        </div>
    </div>

    <div class="row pb-2 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">
        @foreach($pages as $page)
            <div class="col text-break" title="{{ $page->description }}">
                <input type="checkbox"
                    name="page[{{ $page->id }}]"
                    value="{{ $page->id }}"
                    class='d-inline page m-2'
                    {{ in_array($page->id, $selectedPages)
                        ? 'checked'
                        : '' }}
                >
                {{ $page->title }}
            </div>
        @endforeach
    </div>

</x-admin.form>

@push('js')
    <script @nonce>
        toggleChceckerAll({
            button: '[name="all_pages"]',
            items: '.page',
        });
    </script>
@endpush
