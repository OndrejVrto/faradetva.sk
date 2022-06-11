<div class="d-flex align-items-end flex-wrap justify-content-center flex-lg-nowrap justify-content-lg-between" data-no-index>
    <div class="blog_info">
        <span>
            <a href="{{ route('article.author', $oneNews->user->slug) }}">
                <i class="fa-regular fa-user" aria-hidden="true"></i>{{ $oneNews->user->name }}
            </a>
        </span>
        <span>
            <a href="{{ route('article.date', $oneNews->created_string) }}">
                <i class="fa-regular fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->created }}
            </a>
        </span>
        <span>
            <a href="{{ route('article.category', $oneNews->category->slug) }}">
                <i class="fa-solid fa-sitemap" aria-hidden="true"></i>{{ $oneNews->category->title }}
            </a>
        </span>
    </div>

    <span class="small">
        {{ $oneNews->count_words }} {{ trans_choice('messages.slovo', $oneNews->count_words) }}
        /
        {{ $oneNews->read_duration }} {{ trans_choice('messages.minuta', $oneNews->read_duration) }}
        čítania
    </span>
</div>
