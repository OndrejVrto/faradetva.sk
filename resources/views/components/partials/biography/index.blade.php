<div class="row mb-3">

    <figure class="col-12 col-lg-4 order-1 order-lg-0 wow fromleft" data-wow-delay="{{ $delay*0.4 }}s">
        {{ $img }}
    </figure>

    <div class="blog_desc col-12 col-lg-8 order-0 order-lg-1 wow fromright" data-wow-delay="{{ $delay*0.4 }}s">

        <h2 class="h3">
            {{ $title }}
        </h2>

        @if (null !== $birthDate)
            <p class="h6 text-church-template mt-3 mt-lg-0">
                * {{ $birthDate }}
                <span class="ms-3">{{ $birthCity }}</span >
            </p>
        @endif

        @if (null !== $ordDate)
            <p class="fw-bolder fst-italic">
                kňažská vysviacka {{ $ordDate }} {{ $ordCity }}
            </p>
        @endif

        <dl class="row">
            @foreach ($datesCV as $dates)
                <dt @class([
                    'col-sm-3 col-lg-2',
                    'fst-italic' => $dates['kurziva'],
                ])>
                    {{ $dates['roky'] }}
                </dt>
                <dd @class([
                    'col-sm-9 col-lg-10',
                    'fst-italic' => $dates['kurziva'],
                ])>
                    {{ $dates['posobisko'] }}
                </dd>
            @endforeach
        </dl>

        @if (null !== $deathDate)
            <p class="h6 text-church-template">
                † {{ $deathDate }}
                <span class="ms-3">{{ $deathCity }}</span>
            </p>
        @endif

        <p class="fw-bolder">
            <em>{{ $note }}</em>
        </p>

    </div>
</div>
