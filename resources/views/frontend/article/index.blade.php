@section('title', 'Články' )
@section('description', 'Novinky a čLánky farnosti Detva.' )
@section('keywords', 'novinky, článkok, správa, informácia, farnosť Detva, oznamy')

<x-frontend.layout.master>

    <x-frontend.sections.banner
        :header="$title"
        :breadcrumb="$breadCrumb"
        titleSlug="vyzdoba-kostola-a-kaplnky, torta"
    />

    <x-frontend.page.section name="ARTICLE" class="ch_blog_section pt-5" row="true">

        @forelse ($articles as $oneNews)

            @if ($loop->first)
                <!-- ARTICLE {{ $oneNews->id }} Start -->
                <div class="col-lg-12">
                    <div class="blog_item_cover fromtop wow">
                        <div class="row">
                            <div class="col-6 blog_thumb">
                                <img src="{{ $oneNews->getFirstMediaUrl('news_front_picture', 'large-thin') ?: "http://via.placeholder.com/650x300" }}"
                                    class="w-100"
                                    alt="Malý obrázok k článku: {{ $oneNews->title }}."
                                />
                                <div class="blog_overlay">
                                    <a href="{{ route('article.show', $oneNews->slug)}}" class="link_icon"><i class="fas fa-link"></i></a>
                                </div>
                            </div>

                            <div class="col-6 blog_desc">
                                <div class="blog_info pb-3">
                                    <span><a href="{{ route('article.author', $oneNews->user->slug) }}"><i class="far fa-user" aria-hidden="true"></i>{{ $oneNews->user->name }}</a></span>
                                    <span><a href="{{ route('article.date', $oneNews->created_string) }}"><i class="far fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->created }}</a></span>
                                    <span><a href="{{ route('article.category', $oneNews->category->slug) }}"><i class="fas fa-sitemap" aria-hidden="true"></i>{{ $oneNews->category->title }}</a></span>
                                </div>

                                <a class="text-decoration-none" href="{{ route('article.show', $oneNews->slug)}}">
                                    <h2>{{ $oneNews->title }}</h2>
                                </a>
                                <div class="content pt-2 pb-3 text-justify pe-4">
                                    {{$oneNews->teaser}}
                                </div>

                                <a href="{{ route('article.show', $oneNews->slug)}}" class="read_m_link">
                                    Čítať viac
                                    <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ARTICLE {{ $oneNews->id }} End -->
            @else
                <!-- ARTICLE {{ $oneNews->id }} Start -->
                <div class=" col-sm-6 col-lg-4">
                    <div class="blog_item_cover frombottom wow" data-wow-delay=".{{ $oneNews->id * 2 }}s">
                        <div class="blog_thumb">
                            <img src="{{ $oneNews->getFirstMediaUrl('news_front_picture', 'thumb-all-news') ?: "http://via.placeholder.com/370x248" }}"
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
                                {{$oneNews->teaser_medium}}
                            </div>

                            <a href="{{ route('article.show', $oneNews->slug)}}" class="read_m_link">
                                Čítať viac
                                <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ARTICLE {{ $oneNews->id }} End -->
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
