<x-web.layout.master>

    <x-web.sections.banner
        :header="$title"
        :breadcrumb="$breadCrumb"
    />

    <x-web.page.section name="ARTICLE" class="pad_b_30" data-no-index="true">

            @forelse ($articles as $oneNews)

                @if ($loop->first)
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- ARTICLE {{ $oneNews->id }} Start -->
                            <x-partials.card-about
                                title="{{ $oneNews->title }}"
                                side="left"
                                url="{{ route('article.show', $oneNews->slug) }}"
                                text_button="Čítať ..."
                                count_words="{{ $oneNews->count_words }}"
                                read_duration="{{ $oneNews->read_duration }}"
                            >
                                <x-slot:img>
                                    {!! $oneNews->getFirstMedia($oneNews->collectionName)->img('large', [
                                            'id' => 'picNews-'.$oneNews->id,
                                            'class' => 'img-fluid mx-auto w-100',
                                            'alt' => $oneNews->source->source_description,
                                            // 'title' => $img->source->source_description,
                                            // 'title' => $img->title,
                                            'nonce' => csp_nonce(),
                                            'width' => '700',
                                            'height' => '400',
                                        ])
                                !!}
                                    <x-partials.picture-label
                                        class="img-article img-article-left bg-transparent"
                                        for="picNews-{{ $oneNews->id }}"
                                    >
                                        {{ $oneNews->source->source_description }}
                                    </x-partials.picture-label>
                                </x-slot:img>

                                <x-slot:meta>
                                    <span><a href="{{ route('article.author', $oneNews->user->slug) }}"><i class="fa-regular fa-user" aria-hidden="true"></i>{{ $oneNews->user->name }}</a></span>
                                    <span><a href="{{ route('article.date', $oneNews->created_string) }}"><i class="fa-regular fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->created }}</a></span>
                                    <span><a href="{{ route('article.category', $oneNews->category->slug) }}"><i class="fa-solid fa-sitemap" aria-hidden="true"></i>{{ $oneNews->category->title }}</a></span>
                                </x-slot:meta>

                                <x-slot:teaser>
                                    {!! $oneNews->clean_teaser !!}
                                </x-slot:teaser>

                            </x-partials.card-about>
                            <!-- ARTICLE {{ $oneNews->id }} End -->

                        </div>
                    </div>

                    <div class="row" data-masonry='{"percentPosition": true }'>
                @else
                        <!-- ARTICLE {{ $oneNews->id }} Start -->
                        <div class=" col-sm-6 col-lg-4">
                            <div class="blog_item_cover">
                                <div class="blog_thumb">
                                    <img src="{{ $oneNews->getFirstMediaUrl($oneNews->collectionName, 'small') }}"
                                        class="w-100"
                                        alt="Malý obrázok k článku: {{ $oneNews->title }}."
                                    />
                                    <div class="blog_overlay">
                                        <a href="{{ route('article.show', $oneNews->slug)}}" class="link_icon"><i class="fa-solid fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-1 me-2">
                                    <x-partials.picture-label
                                        class="bg-transparent"
                                        for="picNews-{{ $oneNews->id }}"
                                    >
                                        {{ $oneNews->source->source_description_crop }}
                                    </x-partials.picture-label>
                                </div>

                                <div class="blog_desc">
                                    <div class="blog_info d-flex flex-wrap justify-content-around mt-2">
                                        <a href="{{ route('article.author', $oneNews->user->slug) }}">
                                            <i class="fa-regular fa-user" aria-hidden="true"></i>
                                            {{ $oneNews->user->name }}
                                        </a>
                                        <a class="mx-2" href="{{ route('article.date', $oneNews->created_string) }}">
                                            <i class="fa-regular fa-calendar-alt" aria-hidden="true"></i>
                                            {{ $oneNews->created }}
                                        </a>
                                        <a href="{{ route('article.category', $oneNews->category->slug) }}">
                                            <i class="fa-solid fa-sitemap" aria-hidden="true"></i>
                                            {{ $oneNews->category->title_light }}
                                        </a>
                                    </div>

                                    <a class="text-decoration-none" href="{{ route('article.show', $oneNews->slug)}}">
                                        <h3>{{ $oneNews->title }}</h3>
                                    </a>
                                    <div class="content pb-2 text-justify">
                                        {!! $oneNews->clean_teaser !!}
                                    </div>

                                    <div class="d-flex align-items-end justify-content-between">
                                            <a href="{{ route('article.show', $oneNews->slug) }}" class="read_m_link">
                                                Čítať viac
                                                <i class="fa-solid fa-long-arrow-alt-right" aria-hidden="true"></i>
                                            </a>
                                        <span class="small">
                                            {{ $oneNews->count_words }} {{ trans_choice('messages.slovo', $oneNews->count_words) }}
                                            /
                                            {{ $oneNews->read_duration }} {{ trans_choice('messages.minuta', $oneNews->read_duration) }} čítania
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ARTICLE {{ $oneNews->id }} End -->
                @endif
                @if ($loop->last)
                    </div>
                @endif
            @empty
                <!-- ARTICLE No exist Start -->
                <div class="p-5 m-5">
                    <h3>
                        {{ $emptyTitle['name'] }}
                        <em class="ms-3 me-4 text-church-template">{{ $emptyTitle['value'] }}</em>
                        sa nenachádza v žiadnom článku!
                    </h3>
                    <p>
                        Pokračovať na
                        <a class="text-church-template ms-2 me-3" href="{{ route('article.all') }}">
                            všetky články
                        </a>
                        alebo
                        <a class="text-church-template ms-2 me-3" href="{{ route('search.all', $emptyTitle['value'] ) }}">
                            vyhľadať na celej stránke
                        </a>
                    </p>
                </div>
                <!-- ARTICLE No exist End -->
            @endforelse

        <!-- ARTICLE Pagination Start -->
        <div class="row pt-2">
            {{ $articles->onEachSide(1)->links() }}
        </div>
        <!-- ARTICLE Pagination End -->

        <!-- ARTICLE Search Start -->
        <div class="widget widget_search">
            <form id="search-form" class="search-form" action="{{ route('article.search') }}">
                @csrf
                <label>
                    <input type="text" id="search-form-q" name="searchNews" placeholder="Hľadať v článkoch ..." class="search-field">
                </label>
                <input type="submit" class="search-submit" value="Hľadať">
            </form>
        </div>
        <!-- ARTICLE Search End -->

    </x-web.page.section>

</x-web.layout.master>
