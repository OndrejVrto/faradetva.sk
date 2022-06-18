@if ($lastArticles)
    <x-web.page.section
        name="LAST_ARTICLES"
        row="true"
        class="pad_t_50 pad_b_50"
    >

        <x-web.page.section-header header="Novinky" />

        @foreach ($lastArticles as $lastArticle)

            <x-partials.card-about
                title="{{ $lastArticle->title }}"
                side="{{ $loop->even ? 'right' : 'left' }}"
                url="{{ route('article.show', $lastArticle->slug) }}"
                text_button="Čítať ďalej ..."
                count_words="{{ $lastArticle->count_words }}"
                read_duration="{{ $lastArticle->read_duration }}"
            >
                <x-slot:img>
                    {!! $lastArticle->getFirstMedia($lastArticle->collectionName)->img('large', [
                                'id' => 'picNews-'.$lastArticle->id,
                                'class' => 'img-fluid mx-auto w-100',
                                'alt' => $lastArticle->source->source_description,
                                // 'title' => $img->source->source_description,
                                // 'title' => $img->title,
                                'nonce' => csp_nonce(),
                                'width' => '700',
                                'height' => '400',
                            ])
                    !!}
                    <x-partials.picture-label
                        class="img-article bg-transparent"
                        for="picNews-{{ $lastArticle->id }}"
                    >
                        {{ $lastArticle->source->source_description }}
                    </x-partials.picture-label>
                </x-slot:img>

                <x-slot:meta>
                    <span>
                        <a href="{{ route('article.author', $lastArticle->user->slug) }}">
                            <i class="fa-regular fa-user" aria-hidden="true"></i>
                            {{ $lastArticle->user->name }}
                        </a>
                    </span>
                    <span>
                        <a href="{{ route('article.date', $lastArticle->created_string) }}">
                            <i class="fa-regular fa-calendar-alt" aria-hidden="true"></i>
                            {{ $lastArticle->created }}
                        </a>
                    </span>
                    <span>
                        <a href="{{ route('article.category', $lastArticle->category->slug) }}">
                            <i class="fa-solid fa-sitemap" aria-hidden="true"></i>
                            {{ $lastArticle->category->title }}
                        </a>
                    </span>
                </x-slot:meta>

                <x-slot:teaser>
                    {!! $lastArticle->clean_teaser !!}
                </x-slot:teaser>

            </x-partials.card-about>

            @if (!$loop->last)
                <hr class="bg-alt-gray mt-2 mb-5">
            @endif
        @endforeach

        <div class="d-flex justify-content-center">
            <a href="{{ route('article.all') }}" class="link-template fs-5">
                Všetky články
            </a>
        </div>

    </x-web.page.section>
@endif
