@extends('admin._layouts.app')

@section('title', __('backend-texts.prayers.title'))
@section('meta_description', __('backend-texts.prayers.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('prayers.index') }}
@stop

@section('content')
    <x-admin.table
        columns="10"
        controlerName="prayers"
        createBtn="Pridať novú modlitbu"
        paginator="{{ $prayers->onEachSide(1)->links() }}"
        >

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th-check-active/>
            <x-admin.table.th width="20%" class="text-center">Obrázok</x-admin.table.th>
            <x-admin.table.th>Titulka</x-admin.table.th>
            <x-admin.table.th>Text modlitby</x-admin.table.th>
            <x-admin.table.th>Autor / citácia</x-admin.table.th>
            <x-admin.table.th-actions />
        </x-slot>

        <x-slot:table_body>
            @foreach($prayers as $prayer)
                <x-admin.table.tr trashed="{{ $prayer->trashed() }}">

                    {{-- <x-admin.table.td>{{$prayer->id}}</x-admin.table.td> --}}
                    <x-admin.table.td-check-active check="{{ $prayer->active }}"/>
                    <x-admin.table.td class="text-center">
                        <img src="{{ $prayer->getFirstMediaUrl($prayer->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/192x80" }}"
                        class="img-fluid px-3"
                        alt="picture: {{ $prayer->title }}"/>
                    </x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{ $prayer->title }}</x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{ $prayer->quote_row1 }}<br>{{ $prayer->quote_row2 }}</x-admin.table.td>
                    <x-admin.table.td>{{ $prayer->quote_author }}</x-admin.table.td>
                    <x-admin.table.td class="text-center">
                        <a  href="{{ url($prayer->getFirstMediaUrl($prayer->collectionName) ?: '#') }}"
                            class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                            title="Stiahnuť pôvodný obrázok"
                            download
                        >
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="prayers"
                        identificator="{{ $prayer->slug }}"
                        trashed="{{ $prayer->trashed() }}"
                        trashedID="{{ $prayer->id }}"
                    />

                </x-admin.table.tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
