@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.files_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.files_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('files.index') }}
@stop

@section('content')
    <x-backend.table
        columns="8"
        controlerName="files"
        createBtn="Pridať nový dokument"
        paginator="{{ $files->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th>Pracovný názov súboru</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($files as $file)
            <tr>
                {{-- <x-backend.table.td>{{$file->id}}</x-backend.table.td> --}}
                <x-backend.table.td class="text-wrap text-break text-bold">{{ $file->slug }}</x-backend.table.td>
                <x-backend.table.td-actions
                    controlerName="files"
                    identificator="{{ $file->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
