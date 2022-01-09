@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.priests_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.priests_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('priests.index') }}
@stop

@section('content')
    <x-admin-table
        columns="6"
        controlerName="priests"
        createBtn="Pridať nového kňaza"
        paginator="{{ $priests->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th-check-active/>
            <x-admin-table.th width="10%" class="text-center">Fotka</x-admin-table.th>
            <x-admin-table.th width="25%">Meno kňaza</x-admin-table.th>
            <x-admin-table.th>Funkcia</x-admin-table.th>
            <x-admin-table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($priests as $priest)
            <tr>
                {{-- <x-admin-table.td>{{$priest->id}}</x-admin-table.td> --}}
                <x-admin-table.td-check-active check="{{ $priest->active }}"/>
                <x-admin-table.td class="text-center">
                    <img src="{{ $priest->getFirstMediaUrl('priest', 'crop-thumb') ?: "http://via.placeholder.com/60x80" }}"
                    class="img-fluid"
                    alt="Fotografia: {{ $priest->full_name_titles }}, {{ $priest->function }}"/>
                </x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{$priest->full_name_titles}}</x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{$priest->function}}</x-admin-table.td>

                <x-admin-table.td-actions
                    editLink="{{ route('priests.edit', $priest->slug)}}"
                    deleteLink="{{ route('priests.destroy', $priest->id)}}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
