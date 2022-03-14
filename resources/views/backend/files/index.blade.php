@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.files_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.files_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('files.index') }}
@stop

@section('content')
    <x-backend.table
        columns="12"
        controlerName="files"
        createBtn="Pridať nový dokument"
        paginator="{{ $paginator->onEachSide(1)->links() }}"
        >
        <x-slot name="table_header">
            <x-backend.table.th width="1%">#</x-backend.table.th>
            <x-backend.table.th width="15%">Pracovný názov</x-backend.table.th>
            <x-backend.table.th width="25%" class="d-none d-xl-table-cell">Popis súboru</x-backend.table.th>
            <x-backend.table.th>Názov súboru</x-backend.table.th>
            <x-backend.table.th width="10%" class="pl-2 d-none d-md-table-cell">Prípona</x-backend.table.th>
            <x-backend.table.th width="10%" class="d-none d-lg-table-cell text-right pr-3">Veľkosť súboru</x-backend.table.th>
            <x-backend.table.th-actions colspan="4"/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($files as $file)
                <tr>
                    <x-backend.table.td>{{ $file['id'] }}</x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break text-bold">
                        {{ $file['slug'] }}
                    </x-backend.table.td>
                    <x-backend.table.td class="text-wrap d-none d-xl-table-cell">
                        {{ $file['description'] }}
                    </x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break">
                        {{ $file['name'] }}
                    </x-backend.table.td>
                    <x-backend.table.td class="d-none d-md-table-cell">
                        <i class="mx-2 far fa-lg fa-{{ $file['icon'] }}"></i>
                        {{ $file['file_extension'] }}
                    </x-backend.table.td>
                    <x-backend.table.td class="d-none d-lg-table-cell text-right pr-3">
                        {{ $file['humanReadableSize'] }}
                    </x-backend.table.td>
                    <x-backend.table.td class="text-center">
                        <a  href="{{ url($file['file_url']) }}"
                            class="btn btn-outline-warning btn-sm btn-flat"
                            title="Stiahnuť"
                            download
                        >
                            <i class="fas fa-download"></i>
                        </a>
                    </x-backend.table.td>
                    <x-backend.table.td class="text-center">
                        <a  href="{{ url($file['file_url']) }}"
                            class="btn btn-outline-success btn-sm btn-flat"
                            title="Zobraziť v predvolenom prehliadači"
                            target="_blank"
                        >
                            <i class="fas fa-eye"></i>
                        </a>
                    </x-backend.table.td>
                    <x-backend.table.td-actions
                        controlerName="files"
                        identificator="{{ $file['slug'] }}"
                    />
                </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
