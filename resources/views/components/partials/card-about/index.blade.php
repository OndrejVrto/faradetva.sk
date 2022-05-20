@props([
    'title' => '',
    'side'  => 'right',
    'url'   => null,
    'img'   => null,
])

<div class="ch_about_wrap">
    <div class="row d-block d-lg-flex">

        <div @class([
                'col-lg-6',
                'order-2' => $side === 'right',
            ])
        >
            <div class="ch_about_thumb fromleft wow">
                {!! $img !!}
            </div>

        </div>

        <div @class([
                'col-lg-6',
                'order-1' => $side === 'right',
            ])
        >
            <div class="ch_about_desc fromright wow">
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
                    <a href="{{ $url }}" class="join_btn read_btn">
                        Dozvedieť sa viac
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
