<x-web.layout.master>

    <x-web.sections.banner
        :header="$oneNews->title"
        :breadcrumb="$breadCrumb"
    />

    <x-web.page.section name="ARTICLE" class="blog_single_page pad_t_10 pad_b_30" row="true">

            <article class="col-lg-9 col-md-8 col-xs-12">
                <!-- ARTICLE ({{ $oneNews->title }}) - Start -->
                <div class="wh_new">

                    @include('web.article.partials.article-picture')

                    <div class="blog_desc ps-0">
                        @include('web.article.partials.article-info')

                        @include('web.article.partials.article-content')

                        @include('web.article.partials.article-attachments')

                        @include('web.article.partials.article-tags-and-socialite')
                    </div>

                </div>
                <!-- ARTICLE ({{ $oneNews->title }}) - End -->
            </article>

            <!-- ARTICLE SIDEBAR Start -->
            <aside class="col-lg-3 col-md-4 col-xs-12">
                <div class="ch_sidebar_area">

                    @include('web.article.partials.search')

                    @include('web.article.partials.categories')

                    @include('web.article.partials.last-news')

                    @include('web.article.partials.tags')

                </div>
            </aside>
            <!-- ARTICLE SIDEBAR End -->

    </x-web.page.section>
</x-web.layout.master>
