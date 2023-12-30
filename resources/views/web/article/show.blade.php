<x-web.layout.master>

    <x-web.sections.banner
        :header="$oneNews->title"
        :breadcrumb="$breadCrumb"
    />

    <x-web.page.section name="ARTICLE" class="blog_single_page pad_t_10 pad_b_30" row="true">

        <!-- ARTICLE ({{ $oneNews->title }}) - Start -->
        <article class="col-lg-9 col-md-8 col-xs-12">
            @include('web.article.partials.show.article-picture')

            <div class="blog_desc px-0">
                @include('web.article.partials.show.article-info')
                @include('web.article.partials.show.article-content')
                @include('web.article.partials.show.article-attachments')
                @include('web.article.partials.show.article-album')
                @include('web.article.partials.show.article-tags-and-socialite')
            </div>
        </article>
        <!-- ARTICLE ({{ $oneNews->title }}) - End -->

        <!-- ARTICLE ASIDE Start -->
        <aside class="col-lg-3 col-md-4 col-xs-12">
            <div class="ch_sidebar_area">
                @include('web.article.partials.show.search')
                @include('web.article.partials.show.categories')
                @include('web.article.partials.show.last-news')
                @include('web.article.partials.show.tags')
            </div>
        </aside>
        <!-- ARTICLE ASIDE End -->

    </x-web.page.section>
</x-web.layout.master>
