<div class="p-5 m-5">
    <h3>
        {{ $emptyTitle['name'] }}
        <em class="ms-3 me-4 text-church-template">{{ $emptyTitle['value'] }}</em>
        sa nenachádza v žiadnom článku!
    </h3>
    <p>
        Pokračovať na
        <a class="text-church-template ms-2 me-3" href="{{ route('article.all') }}">
            všetky články
        </a>
        alebo
        <a class="text-church-template ms-2 me-3" href="{{ route('search.all', $emptyTitle['value'] ) }}">
            vyhľadať na celej stránke
        </a>
    </p>
</div>
