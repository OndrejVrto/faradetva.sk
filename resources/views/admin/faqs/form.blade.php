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

    <x-adminlte-input
        name="question"
        label="Otázka"
        enableOldSupport="true"
        value="{{ $faq->question ?? '' }}"
        >
        <x-slot:prependSlot>
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-question"></i>
            </div>
        </x-slot>
        @error('slug')
            <x-slot:errorManual>
                {{ $errors->first('slug') }}
            </x-slot>
        @enderror
    </x-adminlte-input>

    <x-adminlte-textarea
        fgroupClass="pb-4"
        name="answer"
        label="Odpoveď"
        enableOldSupport="true"
        rows="3"
    >
        <x-slot:prependSlot>
            <div class="input-group-text bg-gradient-orange">
                <i class="far fa-comment"></i>
            </div>
        </x-slot>
            {{ $faq->answer ?? '' }}
    </x-adminlte-textarea>

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
    <script @nonce>
        toggleChceckerAll({
            button: '[name="all_pages"]',
            items: '.page',
        });
    </script>
@endpush
