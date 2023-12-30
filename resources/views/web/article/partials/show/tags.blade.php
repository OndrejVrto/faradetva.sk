@php( $visible_tags_in_page = 6 )

<section class="widget widget_tagcloud">
    <h3 class="widget-title">
        Kľúčové slová
    </h3>
    <div class="tagcloud d-flex flex-wrap">

        @foreach ( $allTags as $tag )

            @if ( $loop->index === $visible_tags_in_page )
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
                <div>

                <div class="collapse" id="collapseTagID">
                    <div class="tagcloud d-flex flex-wrap">

            @endif

                        <a
                            class="flex-fill text-center"
                            href="{{ route('article.tag', $tag->slug) }}"
                            title="{{ $tag->description }} | {{ $tag->news_count }} {{ trans_choice('messages.clanok', $tag->news_count) }}"
                        >
                            {{ $tag->title }}
                        </a>

            @if ($loop->index > $visible_tags_in_page AND $loop->last)
                    </div>
                </div>
            @endif

        @endforeach

    </div>
</section>
