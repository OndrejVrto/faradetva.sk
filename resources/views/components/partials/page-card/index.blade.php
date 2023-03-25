@foreach ($pageCards as $pageCard)

    <div class="col-sm-6 col-lg-4 mx-auto">
        <div class="blog_item_cover frombottom wow">
            <div class="blog_thumb">

                <img src="{{ $pageCard['img-url'] }}"
                    id="picpk-{{ $pageCard['id'] }}"
                    class="w-100 img-fluid"
                    alt="{{ $pageCard['source_description'] }}"
                    width="{{ $pageCard['img-width'] }}"
                    height="{{ $pageCard['img-height'] }}"
                />

                <x-partials.picture-label
                    class="d-none img-article img-article-right bg-transparent"
                    for="picpk-{{ $pageCard['id'] }}"
                >
                    {{ $pageCard['source_description-crop'] }}
                </x-partials.picture-label>

                <div class="blog_overlay">
                    <a href="{{ $pageCard['url'] }}" class="link_icon">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>

            <div class="blog_desc pt-2">
                <h3 class="fs-4">
                    <a class="link-template" href="{{ $pageCard['url'] }}">
                        {{ $pageCard['header'] }}
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
