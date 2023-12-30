<x-web.layout.master>

    <x-web.sections.banner
        :header="$title"
        :breadcrumb="$breadCrumb"
    />

    <x-web.page.section name="ARTICLE" class="pad_b_30" data-no-index="true">

        <!-- ARTICLE SEARCH Start -->
        @include('web.article.partials.index.search')
        <!-- ARTICLE SEARCH End -->

        @forelse ($articles as $oneNews)
            @if ($loop->first)
                <div class="row">
                    <div class="col-lg-12">
                        <!-- ARTICLE {{ $oneNews->id }} Start -->
                        @include('web.article.partials.index.first-article')
                        <!-- ARTICLE {{ $oneNews->id }} End -->
                    </div>
                </div>

                <div class="row">
            @else
                <div class="col-sm-6 col-lg-4 pb-4">
                    <!-- ARTICLE {{ $oneNews->id }} Start -->
                    @include('web.article.partials.index.article')
                    <!-- ARTICLE {{ $oneNews->id }} End -->
                </div>
            @endif

            @if ($loop->last)
                </div>
            @endif
        @empty
            <!-- ARTICLE IS EMPTY Start -->
            @include('web.article.partials.index.empty-articles')
            <!-- ARTICLE IS EMPTY End -->
        @endforelse

        <!-- ARTICLE PAGINATION Start -->
        @include('web.article.partials.index.pagination')
        <!-- ARTICLE PAGINATION End -->

    </x-web.page.section>

</x-web.layout.master>
