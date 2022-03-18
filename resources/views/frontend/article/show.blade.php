@section('title', $oneNews->title )
@section('description', $oneNews->title . ' --> '. $oneNews->teaser )
@section('keywords', 'novinky, článkok, správa, informácia, farnosť Detva, oznamy')

<x-frontend.layout.master>

    <x-frontend.sections.banner
        :header="$oneNews->title"
        :breadcrumb="$breadCrumb"
        titleSlug="vyzdoba-kostola-a-kaplnky, torta"
    />

    <x-frontend.page.section name="ARTICLE" class="blog_single_page pad_t_50 pad_b_30" row="true">

            <article class="col-lg-9 col-md-8 col-xs-12">
                <!-- ARTICLE {{ $oneNews->title }} - Start -->
                <div class="wh_new">
                    <div class="blog_thumb">
                        {!! $oneNews->getFirstMedia($oneNews->collectionPicture)->img('large', ['class' => 'w-100 img-fluid']) !!}
                    </div>
                    <div class="blog_desc">
                        <div class="blog_info">
                            <span>
                                <a href="{{ route('article.author', $oneNews->user->slug) }}">
                                    <i class="far fa-user" aria-hidden="true"></i>{{ $oneNews->createdBy }}
                                </a>
                            </span>
                            <span>
                                <a href="{{ route('article.date', $oneNews->created_string) }}">
                                    <i class="far fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->created }}
                                </a>
                            </span>
                            <span>
                                <a href="{{ route('article.category', $oneNews->category->slug) }}">
                                    <i class="fas fa-sitemap" aria-hidden="true"></i>{{ $oneNews->category->title }}
                                </a>
                            </span>
                        </div>

                        <h3>{{ $oneNews->title }}</h3>

                        <!-- ARTICLE CONTENT from Sumernote Start -->
                        <div class="content">
                            {!! $oneNews->content !!}
                        </div>
                        <!-- ARTICLE CONTENT from Sumernote End -->

                        @if(!empty($attachments))
                            <!-- ARTICLE ATTACHMENTS Start -->
                            <h3>Prílohy <i class="fas fa-paperclip me-3"></i></h3>
                            @foreach ($attachments as $attachment)
                                <x-partials.attachment-article :data="$attachment"/>
                            @endforeach
                            <!-- ARTICLE ATTACHMENTS End -->
                        @endif

                        <ul class="tag-list">
                            <li><i class="fas fa-tag" aria-hidden="true"></i></li>
                            @foreach ($oneNews->tags as $tag)
                                <li>
                                    <a href="{{ route('article.tag', $tag->slug) }}" title="{{ $tag->description }}">
                                        {{ $tag->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <!-- ARTICLE {{ $oneNews->title }} - End -->
            </article>

            <!-- SIDEBAR Start -->
            <aside class="col-lg-3 col-md-4 col-xs-12">
                <div class="ch_sidebar_area">

                    <section class="widget widget_search">
                        <form id="search-form" class="search-form" action="{{ route('article.search') }}">
                            @csrf
                            <label>
                                <input type="text" id="search-form-q" name="searchNews" placeholder="Hľadať v článkoch ..." class="search-field">
                            </label>
                            <input type="submit" class="search-submit" value="Hľadať">
                        </form>
                    </section>

                    <section class="widget widget_categories">
                        <h3 class="widget-title">
                            Kategórie
                        </h3>
                        <ul>

                            @foreach ($allCategories as $category)
                                <li
                                    class="d-flex justify-content-between"
                                    title="{{ $category->description }} | {{ $category->news_count }} {{ trans_choice('messages.clanok', $category->news_count) }}"
                                >
                                        <a href="{{ route('article.category', $category->slug) }}">{{ $category->title }}</a>
                                        <span class="me-2 text-church-template">{{ $category->news_count }}</span>
                                </li>
                            @endforeach

                        </ul>
                    </section>

                    <section class="widget widget_recent_post">
                        <h3 class="widget-title">
                            Posledné články
                        </h3>
                        <ul>

                            @foreach ($lastNews as $lastOneNews)
                                <li>
                                    {{-- <img src="images/blog/post_1.jpg" alt="Recent blog"> --}}
                                    <img src="{{ $lastOneNews->getFirstMediaUrl($lastOneNews->collectionPicture, 'thumb-latest-news') ?: "http://via.placeholder.com/80x80" }}"
                                        class="img-fluid"
                                        alt="Malý obrázok článku: {{ $lastOneNews->title }}."
                                    />
                                    <div>
                                        <a href="{{ route('article.show', $lastOneNews->slug)}}">{{ $lastOneNews->title }}</a>
                                        {{ $lastOneNews->teaser_light }}
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </section>

                    <section class="widget widget_tagcloud">
                        <h3 class="widget-title">
                            Kľúčové slová
                        </h3>
                        <div class="tagcloud">

                            @foreach ( $allTags as $tag )
                                <a
                                    href="{{ route('article.tag', $tag->slug) }}"
                                    title="{{ $tag->description }} | {{ $tag->news_count }} {{ trans_choice('messages.clanok', $tag->news_count) }}"
                                >
                                    {{ $tag->title }}
                                </a>
                            @endforeach

                        </div>
                    </section>
                </div>
            </aside>
            <!-- SIDEBAR End -->

    </x-frontend.page.section>
</x-frontend.layout.master>
