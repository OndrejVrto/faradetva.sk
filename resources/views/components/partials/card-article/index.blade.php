@props([
    'title' => '',
    'delay' => 1,
    'url'   => null,
    'img'   => null,
    'class' => 'col-sm-6 col-lg-4',
    'buttonText' => 'Dozvedieť sa viac',
])

<div class="mx-auto py-3 {{ $class }}">
    <div class="blog_item_cover frombottom wow h-100 my-0 d-flex flex-column" data-wow-delay="{{ $delay*0.4 }}s">
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
        <div class="blog_desc h-100 d-flex flex-column px-3 py-2">
            <h3 class="fs-4">
                <a class="link-template" href="{{ $url }}">
                    {!! $title !!}
                </a>
            </h3>
            <div class="content pb-3 text-justify">
                {{ $teaser }}
            </div>

            <a href="{{ $url }}" class="read_m_link mt-auto">
                {{ $buttonText }}
                <i class="fa-solid fa-long-arrow-alt-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
