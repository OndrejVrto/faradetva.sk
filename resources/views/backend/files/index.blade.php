@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.files_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.files_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('files.index') }}
@stop

@section('content')
    <x-admin-table
        columns="11"
        controlerName="files"
        createBtn="Pridať nový dokument"
        paginator="{{ $files->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th width="20%">typ súboru</x-admin-table.th>
            <x-admin-table.th width="30%">Stránka</x-admin-table.th>
            <x-admin-table.th>Názov dokumentu</x-admin-table.th>
            <x-admin-table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($files as $file)
            <tr>
                {{-- <x-admin-table.td>{{$file->id}}</x-admin-table.td> --}}
                <x-admin-table.td class="text-wrap text-break">{{ $file->fileType->name }}</x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{ $file->page->url }} <br> {{ $file->page->title }}</x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{ $file->name }}</x-admin-table.td>
                <x-admin-table.td-actions
                    editLink="{{ route('files.edit', $file->id)}}"
                    deleteLink="{{ route('files.destroy', $file->id)}}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
