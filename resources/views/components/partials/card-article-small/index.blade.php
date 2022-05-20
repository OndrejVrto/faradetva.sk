@props([
    'title' => '',
    'delay' => 1,
    'url'   => null,
    'img'   => null,
])

<div class="col-md-6 col-lg-4">
    <div class="blog_item_cover frombottom wow">
        <div class="blog_thumb">
            {!! $img !!}
            <!-- overlay -->
            <div class="blog_overlay">
                <a href="{{ $url }}" class="link_icon">
                    <i class="fa fa-link"></i>
                </a>
            </div>
            <!-- overlay -->
        </div>
        <div class="blog_desc">
            <h3 class="fs-3 mt-4">
                <a href="{{ $url }}">
                    {{ $title }}
                </a>
            </h3>
            <p>
                {{ $teaser }}
            </p>
            <a href="{{ $url }}" class="read_m_link">
                Dozvedieť sa viac
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
