@extends('admin._layouts.app')

@section('title', __('backend-texts.priests.title'))
@section('meta_description', __('backend-texts.priests.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('priests.index') }}
@stop

@section('content')
    <x-admin.table
        columns="6"
        controlerName="priests"
        createBtn="Pridať nového kňaza"
        paginator="{{ $priests->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th-check-active/>
            <x-admin.table.th width="10%" class="text-center">Fotka</x-admin.table.th>
            <x-admin.table.th width="25%">Meno kňaza</x-admin.table.th>
            <x-admin.table.th>Funkcia</x-admin.table.th>
            <x-admin.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($priests as $priest)
                <x-admin.table.tr trashed="{{ $priest->trashed() }}">

                    {{-- <x-admin.table.td>{{$priest->id}}</x-admin.table.td> --}}
                    <x-admin.table.td-check-active check="{{ $priest->active }}"/>
                    <x-admin.table.td class="text-center">
                        <img
                            src="{{ $priest->getFirstMediaUrl($priest->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/60x80" }}"
                            class="img-fluid priest-thumb"
                            alt="Fotografia: {{ $priest->full_name_titles }}, {{ $priest->function }}"
                        />
                    </x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{$priest->full_name_titles}}</x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{$priest->function}}</x-admin.table.td>
                    <x-admin.table.td class="text-center">
                        <a  href="{{ url($priest->getFirstMediaUrl($priest->collectionName) ?: '#') }}"
                            class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                            title="Stiahnuť pôvodnú fotku kňaza"
                            download
                        >
                            <i class="fas fa-download"></i>
                        </a>
                    </x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="priests"
                        identificator="{{ $priest->slug }}"
                        trashed="{{ $priest->trashed() }}"
                        trashedID="{{ $priest->id }}"
                    />

                </x-admin.table.tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
