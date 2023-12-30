<div class="d-flex align-items-end flex-wrap flex-lg-nowrap justify-content-lg-between">

    <!-- ARTICLE TAGS Start -->
        <ul class="tag-list">
            <li>
                <i class="fa-solid fa-tag" aria-hidden="true"></i>
            </li>

            @foreach ($oneNews->tags as $tag)
                <li>
                    <a href="{{ route('article.tag', $tag->slug) }}" title="{{ $tag->description }}">
                        {{ $tag->title }}
                    </a>
                </li>
            @endforeach

        </ul>
    <!-- ARTICLE TAGS End -->

    <!-- ARTICLE SOCIALITE LINKS Start -->
        {!!
            Share::currentPage($oneNews->title)
                ->facebook()
                ->twitter()
                ->linkedin($oneNews->teaser)
                ->whatsapp()
        !!}
    <!-- ARTICLE SOCIALITE LINKS End -->

</div>
