@php
    $config_select = [
        // "placeholder" => " Vyber niekoľko slov popisujúcich obsah ...",
        // "allowClear" => 'true',
    ];
@endphp

<x-adminlte-select2
    name="tags[]"
    id="sel2Tag"
    label="Kľúčové slová"
    :config="$config_select"
    multiple
    >
    <x-slot:prependSlot>
        <div class="input-group-text bg-gradient-orange">
            <i class="fa-solid fa-tag"></i>
        </div>
    </x-slot>

    @if ($tags->count())

    @foreach($tags as $tag)
        <option
            value="{{ $tag->id }}"
            title="{{ $tag->description }}"
            @if( in_array($tag->id, old("tags") ?: []) OR in_array($tag->id, $selectedTags) )
                selected
            @endif
        >
            {{ $tag->title }}
        </option>
    @endforeach

    @endif
</x-adminlte-select2>
