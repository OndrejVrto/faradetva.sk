@props([
    'name' => 'NO NAME',
    'row' => null,
    'overlay' => null,
])
<!-- {{ $name }} section Start -->
    <div {{ $attributes->merge(['class' => 'section']) }}>
        @if($overlay == 'true')<div class="black_overlay">@endif
            <div class="container">
                @if($row == 'true')<div class="row">@endif

                    {{ $slot }}

                @if($row)</div>@endif
            </div>
        @if($overlay)</div>@endif
    </div>
<!-- {{ $name }} section End -->
