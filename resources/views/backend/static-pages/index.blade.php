@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.static-pages_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.static-pages_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('static-pages.index') }}
@stop

@section('content')
    <x-admin-table
        columns="120"
        controlerName="static-pages"
        createBtn="Pridať novú statickú stránku"
        {{-- paginator="{{ $pages->onEachSide(1)->links() }}" --}}
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th width="15%">Titulok záložky</x-admin-table.th>
            <x-admin-table.th-check-active/>
            <x-admin-table.th width="40%">Url <small>(cesta ktorú vidí uživateľ)</small></x-admin-table.th>
            <x-admin-table.th class="d-none d-xl-table-cell">Route <small>(vnútorná cesta aplikácie)</small></x-admin-table.th>
            <x-admin-table.th-actions/>
        </x-slot>

        <x-slot name="top">
            <div class="d-flex justify-content-end">
                {{-- @can('cache.check.url')
                    <a href="{{ route('cache.check.url') }}" class="btn btn-outline-info mx-2">Scanovať iba nové URL</a>
                @endcan --}}
                @can('cache.check.all-url')
                    <a href="{{ route('cache.check.all-url') }}" class="btn btn-outline-info mx-2">Scanovať <strong>všetky</strong> URL</a>
                @endcan
            </div>
        </x-slot>

        <x-slot name="table_body">
            @foreach($pages as $page)
                <tr>
                    {{-- <x-admin-table.td>{{$page->id}}</x-admin-table.td> --}}
                    <x-admin-table.td class="text-wrap text-break text-bold">{{ $page->title }}</x-admin-table.td>
                    <x-admin-table.td-check-active check="{{ $page->check_url }}"/>
                    <x-admin-table.td class="text-wrap text-break">
                        <a href="{{ config('app.url').'/'.$page->url }}" target="_blank" rel="noopener noreferrer">
                            <span class="small text-info">{{ config('app.url').'/'}}</span>{{ $page->url }}
                        </a>
                    </x-admin-table.td>
                    <x-admin-table.td class="text-wrap text-break d-none d-xl-table-cell">{{ $page->route_name }}</x-admin-table.td>
                    <x-admin-table.td-actions
                        controlerName="static-pages"
                        identificator="{{ $page->slug }}"
                    />
                </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
