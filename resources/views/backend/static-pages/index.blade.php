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
        createBtn="Prisať novú statickú stránku"
        paginator="{{ $pages->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th width="10%" class="d-none d-md-table-cell text-center">Banner</x-admin-table.th>
            <x-admin-table.th width="15%">Titulok záložky</x-admin-table.th>
            <x-admin-table.th-check-active/>
            <x-admin-table.th width="30%">Url <small>(cesta ktorú vidí uživateľ)</small></x-admin-table.th>
            <x-admin-table.th class="d-none d-xl-table-cell">Route <small>(vnútorná cesta aplikácie)</small></x-admin-table.th>
            <x-admin-table.th width="7%" class="text-center d-none d-lg-table-cell">Prílohy</x-admin-table.th>
            <x-admin-table.th-actions colspan="3"/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($pages as $page)
                @php
                    //** Check if the Url works
                    $url = config('app.url') . '/' . $page->url;
                    $headers = @get_headers($url);
                    $exists = ($headers && strpos( $headers[0], '200')) ? true : false;
                @endphp
                <tr>
                    {{-- <x-admin-table.td>{{$page->id}}</x-admin-table.td> --}}

                    <x-admin-table.td class="d-none d-md-table-cell text-center">
                        {{-- <img src="{{ $page->getFirstMediaUrl('staticpages_front_picture', 'crop-thumb') ?: "http://via.placeholder.com/170x92" }}"
                        class="img-fluid px-2"
                        alt="Titulná fotka článku: {{ $page->title }}."/> --}}
                    </x-admin-table.td>

                    <x-admin-table.td class="text-wrap text-break text-bold">{{ $page->title }}</x-admin-table.td>
                    <x-admin-table.td-check-active check="{{ $exists }}"/>
                    <x-admin-table.td class="text-wrap text-break">
                        <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">
                            <span class="small text-info">{{ config('app.url').'/'}}</span>{{ $page->url }}
                        </a>
                    </x-admin-table.td>
                    <x-admin-table.td class="text-wrap text-break d-none d-xl-table-cell">{{ $page->route_name }}</x-admin-table.td>
                    <x-admin-table.td class="d-none d-lg-table-cell text-wrap text-break text-center">{{-- $page->file_count --}}</x-admin-table.td>
                    <x-admin-table.td>
                        <a href="{{ route('files.index').'/page/'.$page->id }}" class="btn btn-outline-success btn-sm btn-flat" title="Súbory"><i class="fas fa-paperclip"></i></a>
                    </x-admin-table.td>
                    <x-admin-table.td-actions
                        editLink="{{ route('static-pages.edit', $page->slug)}}"
                        deleteLink="{{ route('static-pages.destroy', $page->slug)}}"
                    />
                </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
