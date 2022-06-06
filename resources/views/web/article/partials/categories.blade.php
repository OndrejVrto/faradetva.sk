@php( $visible_category_in_page = 5 )

<section class="widget widget_categories">
    <h3 class="widget-title">
        Kategórie
    </h3>
    <ul>
        @foreach ($allCategories as $category)

            @if ( $loop->index === $visible_category_in_page )
                <div class="text-center">
                    <a
                        class="link-template-gray"
                        href="#collapseCategoryID"
                        role="button"
                        aria-expanded="false"
                        aria-controls="collapseCategoryID"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseCategoryID"
                    >
                        Všetky kategórie
                    </a>
                </div>

                <div class="collapse mt-3" id="collapseCategoryID">
            @endif

                    <li
                        class="d-flex justify-content-between"
                        title="{{ $category->description }} | {{ $category->news_count }} {{ trans_choice('messages.clanok', $category->news_count) }}"
                    >
                            <a href="{{ route('article.category', $category->slug) }}">{{ $category->title }}</a>
                            <span class="me-2 text-church-template">{{ $category->news_count }}</span>
                    </li>

            @if ($loop->index > $visible_category_in_page AND $loop->last)
                </div>
            @endif

        @endforeach

    </ul>
</section>
