@php
    $controlerName = 'faqs';
    $columns = 10;
    $uploadFiles = 'false';

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $faq ) ) {
        $typeForm = 'edit';
        $identificator = $faq->slug;
        $createdInfo = $faq->created_at->format('d. m. Y \o H:i') . ' (' . $faq->created_at->diffForHumans() . ')';
        $updatedInfo = $faq->updated_at->format('d. m. Y \o H:i') . ' (' . $faq->updated_at->diffForHumans() . ')';
    }
@endphp

<x-admin.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <div class="form-row">
        <div class="col-md-9">

            <x-adminlte-input
                name="question"
                label="Otázka"
                enableOldSupport="true"
                value="{{ $faq->question ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-solid fa-question"></i>
                    </div>
                </x-slot>
                @error('slug')
                    <x-slot:errorManual>
                        {{ $errors->first('slug') }}
                    </x-slot>
                @enderror
            </x-adminlte-input>

        </div>
        <div class="col-md-3">

            <x-adminlte-input
                name="order"
                type="number"
                label="Poradie"
                min="-100"
                nax="100"
                enableOldSupport="true"
                value="{{ $faq->order ?? '1' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-solid fa-arrow-down-wide-short"></i>
                    </div>
                </x-slot>
                <x-slot:noteSlot>
                    Poznámka: -100 až 100
                </x-slot>
            </x-adminlte-input>

        </div>
    </div>

    <div class="form-group">
        <label>Odpoveď</label>

        {{-- Error feedback --}}
        @error('answer')
            <x-admin.error-message>
                {{ $errors->first('answer') }}
            </x-admin.error-message>
        @enderror

        <textarea name="answer" id="editorContent">
            {{ $faq->answer ?? old('answer') }}
        </textarea>
    </div>

    <hr class="bg-orange">

    <div class="form-group">
        <label>Stránky v ktorých sa bude zobrazovať táto otázka</label>
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
    <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.2/tinymce.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/admin-app-tinymce.js'), true) }}"></script>
    <script @nonce>
        toggleChceckerAll({
            button: '[name="all_pages"]',
            items: '.page',
        });
    </script>
@endpush
