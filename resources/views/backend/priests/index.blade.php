@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.priests_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.priests_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('priests.index') }}
@stop

@section('content')
    <x-backend.table
        columns="6"
        controlerName="priests"
        createBtn="Pridať nového kňaza"
        paginator="{{ $priests->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th-check-active/>
            <x-backend.table.th width="10%" class="text-center">Fotka</x-backend.table.th>
            <x-backend.table.th width="25%">Meno kňaza</x-backend.table.th>
            <x-backend.table.th>Funkcia</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($priests as $priest)
            <tr>
                {{-- <x-backend.table.td>{{$priest->id}}</x-backend.table.td> --}}
                <x-backend.table.td-check-active check="{{ $priest->active }}"/>
                <x-backend.table.td class="text-center">
                    <img
                        src="{{ $priest->getFirstMediaUrl($priest->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/60x80" }}"
                        class="img-fluid priest-thumb"
                        alt="Fotografia: {{ $priest->full_name_titles }}, {{ $priest->function }}"
                    />
                </x-backend.table.td>
                <x-backend.table.td class="text-wrap text-break">{{$priest->full_name_titles}}</x-backend.table.td>
                <x-backend.table.td class="text-wrap text-break">{{$priest->function}}</x-backend.table.td>

                <x-backend.table.td-actions
                    controlerName="priests"
                    identificator="{{ $priest->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
