@foreach ($pageCards as $pageCard)

    <div class="col-sm-6 col-lg-4 mx-auto py-3">
        <div class="blog_item_cover frombottom wow h-100 my-0 d-flex flex-column">
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

            <div class="blog_desc h-100 d-flex flex-column px-3 py-2">

                <h3 class="fs-4">
                    <a class="link-template" href="{{ $pageCard['url'] }}">
                        {{ $pageCard['header'] }}
                    </a>
                </h3>

                <div class="content pb-3 text-justify">
                    {{ $pageCard['teaser'] }}
                </div>

                <a href="{{ $pageCard['url'] }}" class="read_m_link mt-auto">
                    {{ $buttonText }}
                    <i class="fa-solid fa-long-arrow-alt-right" aria-hidden="true"></i>
                </a>

            </div>
        </div>
    </div>

@endforeach
