@section('title', 'Články' )
@section('description', 'Novinky a čLánky farnosti Detva.' )
@section('keywords', 'novinky, články, správy, informácie, farnosť Detva, oznamy, ')

<x-frontend.layout.master>

    <x-frontend.sections.banner
        :header="$title"
        :breadcrumb="$breadCrumb"
    />

    <x-frontend.page.section name="ARTICLE" class="ch_blog_section pt-0 pt-lg-5">

            @forelse ($articles as $oneNews)

                @if ($loop->first)
                    <div class="row pb-3 pb-lg-5">
                        <div class="col-lg-12">

                        <!-- ARTICLE {{ $oneNews->id }} Start -->
                            <div class="event_box">
                                <div class="event_thumb">
                                    {{-- <img src="images/event/event-thumb1.jpg" class="img-responsive" alt=""> --}}
                                    <img src="{{ $oneNews->getFirstMediaUrl($oneNews->collectionName, 'large-thin') ?: "http://via.placeholder.com/650x300" }}"
                                                {{-- class="w-100" --}}
                                                class="mx-auto d-block d-lg-none img-fluid mt-0"
                                                alt="Malý obrázok k článku: {{ $oneNews->title }}."
                                    />
                                    <img src="{{ $oneNews->getFirstMediaUrl($oneNews->collectionName, 'large-square') ?: "http://via.placeholder.com/335x290" }}"
                                                {{-- class="w-100" --}}
                                                class="mx-auto d-none d-lg-block"
                                                alt="Malý obrázok k článku: {{ $oneNews->title }}."
                                    />
                                </div>
                                <div class="event_desc ps-0 ps-lg-4 ps-xl-5">
                                    <a class="text-decoration-none link-template" href="{{ route('article.show', $oneNews->slug)}}">
                                        <h2>{{ $oneNews->title }}</h2>
                                    </a>
                                    <div class="event_meta mt-4 mb-3">
                                        <span><a href="{{ route('article.author', $oneNews->user->slug) }}"><i class="far fa-user" aria-hidden="true"></i>{{ $oneNews->user->name }}</a></span>
                                        <span><a href="{{ route('article.date', $oneNews->created_string) }}"><i class="far fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->created }}</a></span>
                                        <span><a href="{{ route('article.category', $oneNews->category->slug) }}"><i class="fas fa-sitemap" aria-hidden="true"></i>{{ $oneNews->category->title }}</a></span>
                                    </div>
                                    <p>
                                        {!! $oneNews->clean_teaser !!}
                                    </p>

                                    <a href="{{ route('article.show', $oneNews->slug)}}" class="event_btn read_btn">
                                        Čítať viac
                                    </a>
                                </div>
                                <div class="d-flex align-items-end justify-content-end">
                                    <span class="small">
                                        {{ $oneNews->count_words }} {{ trans_choice('messages.slovo', $oneNews->count_words) }}
                                        /
                                        {{ $oneNews->read_duration }} {{ trans_choice('messages.minuta', $oneNews->read_duration) }} čítania
                                    </span>
                                </div>
                            </div>
                        <!-- ARTICLE {{ $oneNews->id }} End -->

                        </div>
                    </div>

                    <div class="row" data-masonry='{"percentPosition": true }'>
                @else
                        <!-- ARTICLE {{ $oneNews->id }} Start -->
                        <div class=" col-sm-6 col-lg-4">
                            <div class="blog_item_cover">
                                <div class="blog_thumb">
                                    <img src="{{ $oneNews->getFirstMediaUrl($oneNews->collectionName, 'thumb-all-news') ?: "http://via.placeholder.com/370x248" }}"
                                        class="w-100"
                                        alt="Malý obrázok k článku: {{ $oneNews->title }}."
                                    />
                                    <div class="blog_overlay">
                                        <a href="{{ route('article.show', $oneNews->slug)}}" class="link_icon"><i class="fas fa-link"></i></a>
                                    </div>
                                </div>

                                <div class="blog_desc">
                                    <div class="blog_info">
                                        <span><a href="{{ route('article.author', $oneNews->user->slug) }}"><i class="far fa-user" aria-hidden="true"></i>{{ $oneNews->user->name }}</a></span>
                                        <span><a href="{{ route('article.date', $oneNews->created_string) }}"><i class="far fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->created }}</a></span>
                                        <span><a href="{{ route('article.category', $oneNews->category->slug) }}"><i class="fas fa-sitemap" aria-hidden="true"></i>{{ $oneNews->category->title_light }}</a></span>
                                    </div>

                                    <a class="text-decoration-none" href="{{ route('article.show', $oneNews->slug)}}">
                                        <h3>{{ $oneNews->title }}</h3>
                                    </a>
                                    <div class="content pb-2 text-justify">
                                        {!! $oneNews->clean_teaser !!}
                                    </div>

                                    <div class="d-flex align-items-end justify-content-between">
                                            <a href="{{ route('article.show', $oneNews->slug)}}" class="read_m_link">
                                                Čítať viac
                                                <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
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
                        <a class="text-church-template ms-2 me-3" href="{{ route('article.all') }}">všetky články</a>
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

    </x-frontend.page.section>

</x-frontend.layout.master>
