@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.prayers_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.prayers_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('prayers.index') }}
@stop

@section('content')
    <x-backend.table
        columns="10"
        controlerName="prayers"
        createBtn="Pridať novú modlidbu"
        paginator="{{ $prayers->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th-check-active/>
            <x-backend.table.th width="20%" class="text-center">Obrázok</x-backend.table.th>
            <x-backend.table.th>Titulka</x-backend.table.th>
            <x-backend.table.th>Text modlidby</x-backend.table.th>
            <x-backend.table.th>Autor / citácia</x-backend.table.th>
            <x-backend.table.th-actions colspan="3"/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($prayers as $prayer)
            <tr>
                {{-- <x-backend.table.td>{{$prayer->id}}</x-backend.table.td> --}}
                <x-backend.table.td-check-active check="{{ $prayer->active }}"/>
                <x-backend.table.td class="text-center">
                    <img src="{{ $prayer->getFirstMediaUrl($prayer->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/192x80" }}"
                    class="img-fluid px-3"
                    alt="picture: {{ $prayer->title }}"/>
                </x-backend.table.td>
                <x-backend.table.td class="text-wrap text-break">{{ $prayer->title }}</x-backend.table.td>
                <x-backend.table.td class="text-wrap text-break">{{ $prayer->quote_row1 }}<br>{{ $prayer->quote_row2 }}</x-backend.table.td>
                <x-backend.table.td>{{ $prayer->quote_author }}</x-backend.table.td>
                <x-backend.table.td class="text-center">
                    <a  href="{{ url($prayer->getFirstMediaUrl($prayer->collectionName) ?: '#') }}"
                        class="btn btn-outline-warning btn-sm btn-flat"
                        title="Stiahnuť pôvodný obrázok"
                        download
                    >
                        <i class="fas fa-download"></i>
                    </a>
                </x-backend.table.td>
                <x-backend.table.td-actions
                    controlerName="prayers"
                    identificator="{{ $prayer->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
