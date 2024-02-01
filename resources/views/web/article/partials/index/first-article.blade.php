<x-partials.card-about
    title="{{ $oneNews->title }}"
    side="left"
    url="{{ route('article.show', $oneNews->slug) }}"
    text_button="Čítať ..."
    count_words="{{ $oneNews->count_words }}"
    read_duration="{{ $oneNews->read_duration }}"
    >

    <x-slot:img>
        {!! $oneNews->getFirstMedia($oneNews->collectionName)->img('large', [
                'id' => 'picNews-'.$oneNews->id,
                'class' => 'img-fluid mx-auto w-100',
                'alt' => $oneNews->source->source_description,
                // 'title' => $img->source->source_description,
                // 'title' => $img->title,
                'nonce' => csp_nonce(),
                'width' => '700',
                'height' => '400',
            ])
        !!}
        <x-partials.picture-label
            class="img-article img-article-left bg-transparent"
            for="picNews-{{ $oneNews->id }}"
        >
            {{ $oneNews->source->source_description }}
        </x-partials.picture-label>
    </x-slot:img>

    <x-slot:meta>
        <span>
            <a href="{{ route('article.author', $oneNews->user->slug) }}" rel="author">
                <i class="fa-regular fa-user" aria-hidden="true"></i>
                {{ $oneNews->user->name }}
            </a>
        </span>
        <span>
            <a href="{{ route('article.date', $oneNews->created_string) }}">
                <i class="fa-regular fa-calendar-alt" aria-hidden="true">
                </i>{{ $oneNews->created }}
            </a>
        </span>
        <span>
            <a href="{{ route('article.category', $oneNews->category->slug) }}">
                <i class="fa-solid fa-sitemap" aria-hidden="true"></i>
                {{ $oneNews->category->title }}
            </a>
        </span>
    </x-slot:meta>

    <x-slot:teaser>
        {!! $oneNews->clean_teaser !!}
    </x-slot:teaser>

</x-partials.card-about>
