@props([
    'title' => '',
    'side'  => 'right',
    'url'   => null,
    'img'   => null,
    'text_button' => 'Dozvedieť sa viac',
    'count_words' => null,
    'read_duration' => null,
])

<div class="ch_about_wrap">
    <div class="row d-block d-lg-flex">

        <div @class([
                'col-lg-6',
                'order-2' => $side === 'right',
            ])
        >
            <div class="ch_about_thumb d-flex wow {{ $side === 'right' ? 'fromright' : 'fromleft' }}">
                {!! $img !!}
            </div>

        </div>

        <div @class([
                'col-lg-6',
                'order-1' => $side === 'right',
            ])
        >
            <div class="ch_about_desc h-100 d-flex flex-column align-items-start wow {{ $side === 'right' ? 'fromleft' : 'fromright' }}">
                <h3>
                    <a href="{{ $url }}" class="link-template">
                        {{ $title }}
                    </a>
                </h3>
                @isset($meta)
                    <div class="event_meta mt-2 mb-1">
                        {{ $meta }}
                    </div>
                @endisset
                <p class="text-justify">
                    {{ $teaser }}
                </p>

                <div
                    @class([
                        'mt-auto align-self-center',
                        'align-self-lg-start' => $side === 'right',
                        'align-self-lg-end' => $side !== 'right',
                    ])
                >
                    <a href="{{ $url }}" class="join_btn read_btn rounded-pill">
                        {{ $text_button }}
                        @isset($count_words)
                                <br>
                                <span class="small fw-lighter">
                                    {{ $count_words }} {{ trans_choice('messages.slovo', $count_words) }}
                                </span>
                        @endisset
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
