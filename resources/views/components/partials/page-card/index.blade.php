@foreach ($pageCards as $pageCard)

    <div class="col-sm-6 col-lg-4 mx-auto">
        <div class="blog_item_cover">
            <div class="blog_thumb">
                <img src="{{ $pageCard['img-picture-url'] }}"
                    class="w-100 img-fluid"
                    alt="{{ $pageCard['img-description'] }}"
                    width="{{ $pageCard['img-width'] }}"
                    height="{{ $pageCard['img-height'] }}"
                />
                <div class="blog_overlay">
                    <a href="{{ $pageCard['url'] }}" class="link_icon">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>

            <div class="blog_desc">
                <h3 class="fs-4">
                    <a class="link-template" href="{{ $pageCard['url'] }}">
                        {{ $pageCard['title'] }}
                    </a>
                </h3>
                <div class="content pb-2 text-justify">
                    {{ $pageCard['teaser'] }}
                </div>

                <div class="d-flex align-items-end justify-content-between">
                    <a href="{{ $pageCard['url'] }}" class="read_m_link">
                        {{ $buttonText }}
                        <i class="fa-solid fa-long-arrow-alt-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endforeach
