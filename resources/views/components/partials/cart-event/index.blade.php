@props([
    'side'  => 'right',
    'title' => '',
    'url'   => null,
    'img'   => null,
])
<div class="event_box from{{ $side }} wow">

    @if ($side === 'right')
        <div class="d-lg-none event_thumb">
            {!! $img !!}
        </div>
    @else
        <div class="event_thumb">
            {!! $img !!}
        </div>
    @endif

    <div class="event_desc">
        <h3>{{ $title }}</h3>
        <p class="d-xl-none">
            {{ $small_teaser }}
        </p>
        <p class="d-none d-xl-block d-xxl-none">
            {{ $medium_teaser }}
        </p>
        <p class="d-none d-xxl-block">
            {{ $full_teaser }}
        </p>
        <a href="{{ $url }}" class="event_btn read_btn text-justify">
            Dozvedieť sa viac
        </a>
    </div>

    @if ($side === 'right')
        <div class="event_thumb d-none d-lg-table-cell">
            {!! $img !!}
        </div>
    @endif
</div>
