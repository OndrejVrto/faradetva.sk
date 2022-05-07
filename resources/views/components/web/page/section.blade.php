@props([
    'name' => null,
    'row' => null,
    'overlay' => null,
])
<!-- {{ $name }} section Start -->
    <section {{ $attributes->merge(['class' => 'section']) }}>
        @isset($overlay)<div class="black_overlay">@endisset
            <div class="container">
                @isset($row)<div class="row">@endisset

                    {{ $slot }}

                @isset($row)</div>@endisset
            </div>
        @isset($overlay)</div>@endisset
    </section>
<!-- {{ $name }} section End -->
