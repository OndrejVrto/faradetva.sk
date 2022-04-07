@extends('backend._layouts.app')

@section('title', __('backend-texts.static-pages.title'))
@section('meta_description', __('backend-texts.static-pages.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('static-pages.index') }}
@stop

@section('content')
    <x-backend.table
        columns="120"
        controlerName="static-pages"
        createBtn="Pridať novú stránku"
        {{-- paginator="{{ $pages->onEachSide(1)->links() }}" --}}
    >

        <x-slot name="headerLeft">
            @can('cache.crawl-all-url')
                <a href="{{ route('cache.crawl-all-url') }}" class="btn btn-flat bg-gradient-pink flex-fill flex-md-grow-0 mb-2 mb-md-0">Scanovať <strong>všetky</strong> URL</a>
            @endcan
        </x-slot>

        <x-slot name="table_header">
            <x-backend.table.th width="1%">#</x-backend.table.th>
            <x-backend.table.th width="5%">Obrázok</x-backend.table.th>
            <x-backend.table.th width="12%">Titulok záložky</x-backend.table.th>
            <x-backend.table.th-check-active/>
            <x-backend.table.th width="30%" class="d-none d-md-table-cell">Url <small>(cesta ktorú vidí uživateľ)</small></x-backend.table.th>
            <x-backend.table.th class="d-none d-xl-table-cell">Route <small>(vnútorná cesta aplikácie)</small></x-backend.table.th>
            <x-backend.table.th class="text-center d-none d-xl-table-cell">Počet banerov</x-backend.table.th>
            <x-backend.table.th
                class="text-center d-none d-xl-table-cell"
                title="Otázky sa ku stránke priraďujú na karte 'Otázky a odpovede'">
                    Počet otázok
            </x-backend.table.th>
            <x-backend.table.th-actions />
        </x-slot>

        <x-slot name="table_body">
            @foreach($pages as $page)
                <x-backend.table.tr trashed="{{ $page->trashed() }}">

                    <x-backend.table.td>{{$page->id}}</x-backend.table.td>
                    <x-backend.table.td class="text-center">
                        <img src="{{ $page->getFirstMediaUrl($page->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/100x50" }}"
                        class="img-fluid"
                        alt="Obrázok: {{ $page->source->description ?? '' }}"/>
                    </x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break text-bold">{{ $page->title }}</x-backend.table.td>
                    <x-backend.table.td-check-active check="{{ $page->check_url }}"/>
                    <x-backend.table.td class="text-wrap text-break d-none d-md-table-cell">
                        <a href="{{ config('app.url').'/'.$page->url }}" target="_blank" rel="noopener noreferrer">
                            <span class="small text-info">{{ config('app.url').'/'}}</span>{{ $page->url }}
                        </a>
                    </x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break d-none d-xl-table-cell">{{ $page->route_name }}</x-backend.table.td>
                    <x-backend.table.td class="text-center d-none d-xl-table-cell">
                        @if( $page->banners_count != 0 )
                            <span class="badge bg-orange px-2 py-1">{{ $page->banners_count }}</span>
                        @endif
                    </x-backend.table.td>
                    <x-backend.table.td class="text-center d-none d-xl-table-cell">
                        @if( $page->faqs_count != 0 )
                            <span class="badge bg-orange px-2 py-1">{{ $page->faqs_count }}</span>
                        @endif
                    </x-backend.table.td>
                    <x-backend.table.td class="text-center">
                        <div class="d-inline-flex">
                            @if(!$page->trashed())
                                <a  href="{{ config('app.url').'/'.$page->url }}"
                                    class="w35 ml-1 btn btn-outline-secondary btn-sm btn-flat"
                                    title="Zobraziť v novom okne"
                                    target="_blank"
                                >
                                    <i class="fas fa-eye"></i>
                                </a>
                            @endif
                            <a  href="{{ url($page->getFirstMediaUrl($page->collectionName) ?: '#') }}"
                                class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                                title="Stiahnuť referenčný obrázok"
                                download
                            >
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </x-backend.table.td>
                    <x-backend.table.td-actions
                        controlerName="static-pages"
                        identificator="{{ $page->slug }}"
                        trashed="{{ $page->trashed() }}"
                        trashedID="{{ $page->id }}"
                    />

                </x-backend.table.tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
