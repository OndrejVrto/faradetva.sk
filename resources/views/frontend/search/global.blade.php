<x-frontend.layout.master>

    <x-frontend.page.section name="SEARCH Global" class="static-page pad_t_50 pad_b_50">

        {{-- @dd($searchResults) --}}

        <ul class="list-unstyled">
            @foreach($searchResults as $hit)
                <li class="mb-3">
                    <a href="{{ $hit->url }}" class="link-template">
                        <h5>{{ $hit->title() }}</h5>
                        <div>{{ $hit->url }}</div>
                        {{-- <div>{!! $hit->highlightedSnippet() !!}</div> --}}
                    </a>
                </li>
            @endforeach
        </ul>

    </x-frontend.page.section>
</x-frontend.layout.master>
