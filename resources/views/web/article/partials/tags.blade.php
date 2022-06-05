<section class="widget widget_tagcloud">
    <h3 class="widget-title">
        Kľúčové slová
    </h3>
    <div class="tagcloud d-flex flex-wrap">

        @foreach ( $topTags as $tag )
            <a
                class="flex-fill text-center"
                href="{{ route('article.tag', $tag->slug) }}"
                title="{{ $tag->description }} | {{ $tag->news_count }} {{ trans_choice('messages.clanok', $tag->news_count) }}"
            >
                {{ $tag->title }}
            </a>
        @endforeach

    </div>

    <div class="text-center">
        <a
            class="link-template-gray"
            href="#collapseTagID"
            role="button"
            aria-expanded="false"
            aria-controls="collapseTagID"
            data-bs-toggle="collapse"
            data-bs-target="#collapseTagID"
        >
            Všetky slová
        </a>
    <divp>

    <div class="collapse" id="collapseTagID">
        <div class="tagcloud d-flex flex-wrap mt-2">

            @foreach ( $allTags as $tag )
                <a
                    class="flex-fill text-center"
                    href="{{ route('article.tag', $tag->slug) }}"
                    title="{{ $tag->description }} | {{ $tag->news_count }} {{ trans_choice('messages.clanok', $tag->news_count) }}"
                >
                    {{ $tag->title }}
                </a>
            @endforeach

        </div>
    </div>
</section>
