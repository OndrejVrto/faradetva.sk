@props([
    'name' => null,
    'description' => null,
    'delay' => 1,
    'birthDate'  => null,
    'birthCity'  => null,
    'ordDate'    => null,
    'ordCity'    => null,
    'place'      => null,
    'deathDate'  => null,
    'deathCity'  => null,
    'deathPlace' => null,
])

<div class="row">
    <div class="card wow fromright" data-wow-delay="{{ $delay*0.4 }}s">

        <h2 class="h3">
            {{ $name }}
        </h2>

        @if(null !== $birthDate || null !== $birthCity)
            <p class="h6 text-church-template mt-3 mt-lg-0">
                * {{ $birthDate }}
                <span class="ms-3">{{ $birthCity }}</span >
            </p>
        @endif

        @if(null !== $ordDate || null !== $ordCity)
            <p class="fw-bolder fst-italic">
                vysviacka {{ $ordDate }} {{ $ordCity }}
            </p>
        @endif

        <p>{{ $place }}</p>

        @if(null !== $deathDate || null !== $deathCity)
            <p class="h6 text-church-template">
                † {{ $deathDate }}
                <span class="ms-3">{{ $deathCity }}</span>
            </p>
        @endif

        @if(null !== $deathPlace)
            <p class="h6">
                {{ $deathPlace }}
            </p>
        @endif

    </div>
</div>
