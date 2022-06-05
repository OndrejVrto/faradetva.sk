<section class="widget widget_categories">
    <h3 class="widget-title">
        Kategórie
    </h3>
    <ul>
        @foreach ($topCategories as $category)
            <li
                class="d-flex justify-content-between"
                title="{{ $category->description }} | {{ $category->news_count }} {{ trans_choice('messages.clanok', $category->news_count) }}"
            >
                    <a href="{{ route('article.category', $category->slug) }}">{{ $category->title }}</a>
                    <span class="me-2 text-church-template">{{ $category->news_count }}</span>
            </li>
        @endforeach

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
            @foreach ($allCategories as $category)
                <li
                    class="d-flex justify-content-between"
                    title="{{ $category->description }} | {{ $category->news_count }} {{ trans_choice('messages.clanok', $category->news_count) }}"
                >
                        <a href="{{ route('article.category', $category->slug) }}">{{ $category->title }}</a>
                        <span class="me-2 text-church-template">{{ $category->news_count }}</span>
                </li>
            @endforeach
        </div>

    </ul>
</section>
