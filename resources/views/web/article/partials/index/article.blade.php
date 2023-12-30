<div class="blog_item_cover frombottom wow h-100 d-flex flex-column" data-wow-delay="{{ ((($loop->index - 1) % 3) + 1) * 0.4 }}s">
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

    <div class="blog_desc h-100 d-flex flex-column px-3 py-2">
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

        <div class="d-flex align-items-end justify-content-between mt-auto">
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
