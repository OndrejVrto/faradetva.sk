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
        createBtn="Pridať novú statickú stránku"
        {{-- paginator="{{ $pages->onEachSide(1)->links() }}" --}}
    >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th width="15%">Titulok záložky</x-backend.table.th>
            <x-backend.table.th-check-active/>
            <x-backend.table.th width="40%">Url <small>(cesta ktorú vidí uživateľ)</small></x-backend.table.th>
            <x-backend.table.th class="d-none d-xl-table-cell">Route <small>(vnútorná cesta aplikácie)</small></x-backend.table.th>
            <x-backend.table.th class="text-center">Počet banerov</x-backend.table.th>
            <x-backend.table.th-actions />
        </x-slot>

        <x-slot name="top">
            <div class="d-flex justify-content-end">
                @can('cache.crawl-all-url')
                    <a href="{{ route('cache.crawl-all-url') }}" class="btn btn-outline-info mx-2">Scanovať <strong>všetky</strong> URL</a>
                @endcan
            </div>
        </x-slot>

        <x-slot name="table_body">
            @foreach($pages as $page)
                <x-backend.table.tr trashed="{{ $page->trashed() }}">

                    {{-- <x-backend.table.td>{{$page->id}}</x-backend.table.td> --}}
                    <x-backend.table.td class="text-wrap text-break text-bold">{{ $page->title }}</x-backend.table.td>
                    <x-backend.table.td-check-active check="{{ $page->check_url }}"/>
                    <x-backend.table.td class="text-wrap text-break">
                        <a href="{{ config('app.url').'/'.$page->url }}" target="_blank" rel="noopener noreferrer">
                            <span class="small text-info">{{ config('app.url').'/'}}</span>{{ $page->url }}
                        </a>
                    </x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break d-none d-xl-table-cell">{{ $page->route_name }}</x-backend.table.td>
                    <x-backend.table.td class="text-center">
                        @if( $page->banners_count != 0 )
                            <span class="badge bg-orange px-2 py-1">{{ $page->banners_count }}</span>
                        @endif
                    </x-backend.table.td>
                    <x-backend.table.td class="text-center">
                        @if(!$page->trashed())
                            <a  href="{{ config('app.url').'/'.$page->url }}"
                                class="btn btn-outline-success btn-sm btn-flat"
                                title="Zobraziť v novom okne"
                                target="_blank"
                            >
                                <i class="fas fa-eye"></i>
                            </a>
                        @endif
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
