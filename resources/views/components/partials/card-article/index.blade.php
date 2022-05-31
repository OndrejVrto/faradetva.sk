@props([
    'title' => '',
    'delay' => 1,
    'url'   => null,
    'img'   => null,
    'buttonText' => 'Dozvedieť sa viac',
])

<div class="col-sm-6 col-lg-4 mx-auto">
    <div class="blog_item_cover frombottom wow" data-wow-delay="{{ $delay*0.4 }}s">
        <div class="blog_thumb">
            {!! $img !!}
            <!-- overlay -->
            <div class="blog_overlay">
                <a href="{{ $url }}" class="link_icon">
                    <i class="fa-solid fa-link"></i>
                </a>
            </div>
            <!-- overlay -->
        </div>
        <div class="blog_desc">
            <h3 class="fs-4">
                <a class="link-template" href="{{ $url }}">
                    {{ $title }}
                </a>
            </h3>
            <div class="content pb-2 text-justify">
                {{ $teaser }}
            </div>

            <div class="d-flex align-items-end justify-content-between">
                <a href="{{ $url }}" class="read_m_link">
                    {{ $buttonText }}
                    <i class="fa-solid fa-long-arrow-alt-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>
