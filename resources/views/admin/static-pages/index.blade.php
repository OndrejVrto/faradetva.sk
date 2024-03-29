@extends('admin._layouts.app')

@section('title', __('backend-texts.static-pages.title'))
@section('meta_description', __('backend-texts.static-pages.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('static-pages.index') }}
@stop

@section('content')
    <x-admin.table
        columns="120"
        controlerName="static-pages"
        createBtn="Pridať novú stránku"
        {{-- paginator="{{ $pages->onEachSide(1)->links() }}" --}}
    >

        <x-slot:headerLeft>
            @can('admin.dashboard.commands')
                <a  href="{{ route('admin.dashboard.commands', ['command' => 'crawl_url']) }}"
                    class="btn btn-flat bg-gradient-pink flex-fill flex-md-grow-0 mb-2 mb-md-0"
                >
                    Scanovať<strong class="mx-1">všetky</strong>URL
                </a>

                <a  href="{{ route('static-pages.index', ['only-deactivated=true']) }}"
                    class="ml-3 btn btn-flat bg-gradient-secondary flex-fill flex-md-grow-0 mb-2 mb-md-0"
                >
                    Zobraziť iba<strong class="mx-1">deaktivované</strong>stránky
                </a>
            @endcan
        </x-slot>

        <x-slot:table_header>
            <x-admin.table.th width="1%" colspan="2" >#</x-admin.table.th>
            <x-admin.table.th class="text-center" width="12%">Obrázok</x-admin.table.th>
            <x-admin.table.th width="20%">Titulok záložky</x-admin.table.th>
            <x-admin.table.th-check-active class="d-none d-md-table-cell">Check</x-admin.table.th-check-active>
            <x-admin.table.th width="50%" class="d-none d-md-table-cell">
                Url <small>(cesta ktorú vidí uživateľ)</small>
                <br>
                Route <small>(vnútorná cesta aplikácie)</small>
            </x-admin.table.th>
            <x-admin.table.th
                width="5%"
                colspan="2"
                class="text-center d-none d-xl-table-cell"
                title="Otázky sa ku stránke priraďujú na karte 'Otázky a odpovede'">
                    Banerov
                    <br>
                    FaQ
            </x-admin.table.th>
            <x-admin.table.th-actions />
        </x-slot>

        <x-slot:table_body>
            @foreach($pages as $page)
                <x-admin.table.tr trashed="{{ $page->trashed() }}">

                    {{-- <x-admin.table.td>{{$page->id}}</x-admin.table.td> --}}
                    <x-admin.table.td-check-active check="{{ $page->active }}" check_false_title="Stránka je zakázaná"/>
                    <x-admin.table.td>{{ $loop->iteration }}</x-admin.table.td>
                    <x-admin.table.td class="text-center">
                        <img src="{{ $page->getFirstMediaUrl($page->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/100x50" }}"
                        class="img-fluid"
                        alt="Obrázok: {{ $page->source->description ?? '' }}"/>
                    </x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break text-bold">{{ $page->title }}</x-admin.table.td>
                    <x-admin.table.td-check-active
                        virtual="{{ $page->virtual }}"
                        check="{{ $page->check_url }}"
                        check_false_title="Stránka je nedostupná"
                        class="d-none d-md-table-cell text-center"
                    />
                    <x-admin.table.td class="text-wrap text-break d-none d-md-table-cell">
                        <a href="{{ url($page->url) }}" target="_blank" rel="noopener noreferrer">
                            <span class="small text-info">
                                {{ config('app.url').'/'}}
                            </span>
                            {{ Str::endsWith($page->url, '/') ? Str::beforeLast($page->url, '/') : $page->url }}
                            <br>
                            <span class="small text-muted">
                                {{ $page->route_name }}
                            </span>
                        </a>
                    </x-admin.table.td>
                    <x-admin.table.td class="text-center d-none d-xl-table-cell">
                        @if( $page->banners_count != 0 )
                            <span class="badge bg-orange px-2 py-1" title="Použitých banerov na stránke: {{ $page->banners_count }}ks">{{ $page->banners_count }}</span>
                        @elseif(!$page->virtual)
                            <span class="badge bg-orange px-2 py-1" title="Všetky banery">
                                <i class="fa-solid fa-infinity"></i>
                            </span>
                        @endif
                    </x-admin.table.td>
                    <x-admin.table.td class="text-center d-none d-xl-table-cell">
                        @if( $page->faqs_count != 0 )
                            <span class="badge bg-purple px-2 py-1" title="Počet otázok priradených stránke">{{ $page->faqs_count }}</span>
                        @endif
                    </x-admin.table.td>
                    <x-admin.table.td class="text-center d-none d-md-table-cell">
                        <div class="d-inline-flex">
                            @if(!$page->trashed())
                                <a  href="{{ config('app.url').'/'.$page->url }}"
                                    class="w35 ml-1 btn btn-outline-secondary btn-sm btn-flat"
                                    title="Zobraziť v novom okne"
                                    target="_blank"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            @else
                                <div class="w35 ml-1"></div>
                            @endif
                            {{-- <a  href="{{ url($page->getFirstMediaUrl($page->collectionName) ?: '#') }}"
                                class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                                title="Stiahnuť referenčný obrázok"
                                download
                            >
                                <i class="fa-solid fa-download"></i>
                            </a> --}}
                        </div>
                    </x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="static-pages"
                        identificator="{{ $page->slug }}"
                        trashed="{{ $page->trashed() }}"
                        trashedID="{{ $page->id }}"
                    />

                </x-admin.table.tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
