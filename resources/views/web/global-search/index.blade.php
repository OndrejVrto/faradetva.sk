<x-web.layout.master :disablePreload="true">

    <x-web.sections.banner
        header="Vyhľadávnie na stránke"
        {{-- :breadcrumb="$pageData['breadCrumb']" --}}
        dimensionSource="full"
    />

    <x-web.page.section name="SEARCH Global" class="static-page pad_t_50 pad_b_50" data-no-index="true">

        <!-- GLOBAL Search Start -->
        <section class="widget widget_search mb-2">
            <form id="search-form-all2" class="search-form" action="{{ route('search.all') }}">
                @csrf
                <label>
                    <input value="{{ $searchFrase ?? '' }}" type="text" id="inputSearch2" name="searchNews" placeholder="Hľadať na celej stránke ..." class="search-field">
                </label>
                <input type="submit" class="search-submit" value="Hľadať">
            </form>
        </section>
        <!-- GLOBAL Search End -->

        @if(!is_null($searchResults) AND $searchResults->totalCount > 0)

            <span class="ms-2">Počet výsledkov: {{ $searchResults->totalCount == 100 ? 'viac ako 100' : $searchResults->totalCount }} <span class="small ms-1">({{ $searchResults->processingTimeInMs }}ms)</span></span>

            <ul class="list-unstyled search-global mt-5">
                @foreach($searchResults->hits as $hit)
                    <li class="mb-5">
                        <a class="link-template" href="{{ $hit->url }}">
                            <h4 class="mb-0">
                                {{ $hit->h1 }}
                            </h4>
                            <div class="mb-1" title="{{ $hit->pageTitle }}">
                                {{ $hit->url }}
                            </div>
                        </a>
                        <div class="fw-bolder">
                            {{ $hit->description }}
                        </div>
                        <div>
                            {{ str(Str::plainText($hit->entry))->words(18, ' ...') }}
                        </div>
                    </li>
                @endforeach
            </ul>

        @else

            <!-- GLOBAL SEARCH No exist Start -->
            <div class="p-5 m-5">
                <h3>
                    Hľadaný výraz sa nenachádza na stránke!
                </h3>
                <p>
                    Pokračovať na
                    <a class="text-church-template ms-2 me-3" href="{{ route('article.all') }}">
                        všetky články
                    </a>
                    alebo
                    <a class="text-church-template ms-2 me-3" href="{{ route('home') }}">
                        na hlavnú stránku.
                    </a>
                </p>
            </div>
            <!-- GLOBAL SEARCH No exist End -->

        @endif

    </x-web.page.section>
</x-web.layout.master>
