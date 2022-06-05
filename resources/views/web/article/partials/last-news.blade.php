<section class="widget widget_recent_post">
    <h3 class="widget-title">
        Posledné články
    </h3>
    <ul>

        @foreach ($lastNews as $lastOneNews)
            <li>
                <img src="{{ $lastOneNews->getFirstMediaUrl($lastOneNews->collectionName, 'latest') ?: "http://via.placeholder.com/80x80" }}"
                    class="img-fluid"
                    alt="Malý obrázok článku: {{ $lastOneNews->title }}."
                />
                <div>
                    <a href="{{ route('article.show', $lastOneNews->slug)}}" title="{{ $lastOneNews->teaser }}">{{ $lastOneNews->title }}</a>
                    {{ $lastOneNews->teaser_light }}
                </div>
            </li>
        @endforeach

    </ul>
</section>
