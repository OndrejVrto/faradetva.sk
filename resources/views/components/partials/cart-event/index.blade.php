@props([
    'side'  => 'right',
    'title' => '',
    'url'   => null,
    'img'   => null,
])

<div @class([
        'event_box d-lg-flex wow',
        'fromright' => $side === 'right',
        'fromleft'  => $side !== 'right',
    ])
>

    <div @class([
            'event_thumb',
            'order-2' => $side === 'right',
        ])
    >
        {!! $img !!}
    </div>

    <div @class([
            'event_desc',
            'order-1' => $side === 'right',
        ])
    >
        <h3>
            {{ $title }}
        </h3>
        <p class="text-justify">
            {{ $teaser }}
        </p>
        <div
            @class([
                'd-lg-flex',
                'justify-content-start' => $side === 'right',
                'justify-content-end' => $side !== 'right',
            ])
        >
            <a href="{{ $url }}" class="event_btn read_btn">
                Dozvedieť sa viac
            </a>
        </div>
    </div>

</div>
