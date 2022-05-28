<x-web.layout.master :disablePreload="true">

    <x-web.sections.banner
        header="Vyhľadávnie na stránke"
        {{-- :breadcrumb="$pageData['breadCrumb']" --}}
        dimensionSource="full"
    />

    <x-web.page.section name="SEARCH Global" class="static-page pad_t_50 pad_b_50">

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

            <span class="ms-2">Počet výsledkov: {{ $searchResults->totalCount }} <span class="small ms-1">({{ $searchResults->processingTimeInMs }}ms)</span></span>

            <ul class="list-unstyled search-global mt-5">
                @foreach($searchResults->hits as $hit)
                    <li class="mb-5">
                        <a class="link-template" href="{{ $hit->url }}">
                            <div class="">
                                {{ $hit->url }}
                            </div>
                            <h4 class="my-0">
                                {{ str($hit->title())->before(config('farnost-detva.title_postfix')) }}
                            </h4>
                        </a>
                        <div class="fw-bolder">
                            {{ $hit->description }}
                        </div>
                        <div class="small">
                            {{ str($hit->entry)->words(18, ' ...') }}
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
                    <a class="text-church-template ms-2 me-3" href="{{ route('article.all') }}">všetky články</a>
                </p>
            </div>
            <!-- GLOBAL SEARCH No exist End -->
        @endif

    </x-web.page.section>
</x-web.layout.master>
