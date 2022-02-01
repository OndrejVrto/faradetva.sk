<x-adminlte-select2
    name="category_id"
    label="Kategória článku"
    {{-- data-placeholder="Vybrať kategóriu článku ..." --}}
    >
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-orange">
            <i class="fas fa-stream"></i>
        </div>
    </x-slot>
    <option/>
    @if ($categories->count())

        @foreach($categories as $category)
            <option
                value="{{ $category->id }}"
                title="{{ $category->description }}"
                @if( $category->id == ($news->category_id ?? '') OR $category->id == old('category_id'))
                    selected
                @endif
                >
                {{ $category->title }}
            </option>
        @endforeach

    @endif
</x-adminlte-select2>
