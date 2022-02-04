@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.file-types_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.file-types_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('file-types.index') }}
@stop

@section('content')
    <x-admin-table
        columns="10"
        controlerName="file-types"
        createBtn="Pridať nový dokument"
        paginator="{{ $fileTypes->onEachSide(1)->links() }}"
        >

        <x-slot name="createNote">
            Po vložení súboru do kategórie, nebude možné zmeniť názov ani vymazať.
        </x-slot>

        <x-slot name="table_header">
            <x-admin-table.th width="30%">Typ dokumentu</x-admin-table.th>
            <x-admin-table.th>Popis typu</x-admin-table.th>
            {{-- <x-admin-table.th width="1%">Počet súborov</x-admin-table.th> --}}
            <x-admin-table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($fileTypes as $fileType)
            <tr>
                {{-- <x-admin-table.td>{{$fileType->id}}</x-admin-table.td> --}}
                <x-admin-table.td class="text-wrap text-break">{{$fileType->name}}</x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{$fileType->description}}</x-admin-table.td>
                {{-- TODO: Count Files in this filetype --}}
                <x-admin-table.td-actions
                    controlerName="file-types"
                    identificator="{{ $fileType->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
