@extends('admin._layouts.app')

@section('title', __('backend-texts.files.title'))
@section('meta_description', __('backend-texts.files.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('files.index') }}
@stop

@section('content')
    <x-admin.table
        columns="12"
        controlerName="files"
        createBtn="Pridať nový dokument"
        paginator="{{ $paginator->onEachSide(1)->links() }}"
        >
        <x-slot:table_header>
            <x-admin.table.th width="1%">#</x-admin.table.th>
            <x-admin.table.th width="15%">Pracovný názov</x-admin.table.th>
            <x-admin.table.th width="25%" class="d-none d-xl-table-cell">Popis súboru</x-admin.table.th>
            <x-admin.table.th>Názov súboru</x-admin.table.th>
            <x-admin.table.th width="10%" class="pl-2 d-none d-md-table-cell">Prípona</x-admin.table.th>
            <x-admin.table.th width="10%" class="d-none d-lg-table-cell text-right pr-3">Veľkosť súboru</x-admin.table.th>
            <x-admin.table.th-actions />
        </x-slot>

        <x-slot:table_body>
            @foreach($files as $file)
                <tr>
                    <x-admin.table.td>{{ $file['id'] }}</x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break text-bold">
                        {{ $file['slug'] }}
                    </x-admin.table.td>
                    <x-admin.table.td class="text-wrap d-none d-xl-table-cell">
                        {{ $file['source_description'] }}
                    </x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">
                        {{ $file['name'] }}
                    </x-admin.table.td>
                    <x-admin.table.td class="d-none d-md-table-cell">
                        <i class="mx-2 far fa-lg fa-{{ $file['icon'] }}"></i>
                        {{ $file['file_extension'] }}
                    </x-admin.table.td>
                    <x-admin.table.td class="d-none d-lg-table-cell text-right pr-3">
                        {{ $file['humanReadableSize'] }}
                    </x-admin.table.td>
                    <x-admin.table.td class="text-center">
                        <div class="d-inline-flex">
                            <a  href="{{ url($file['file_url']) }}"
                                class="w35 ml-1 btn btn-outline-secondary btn-sm btn-flat"
                                title="Zobraziť v predvolenom prehliadači"
                                target="_blank"
                            >
                                <i class="fas fa-eye"></i>
                            </a>
                            <a  href="{{ url($file['file_url']) }}"
                                class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                                title="Stiahnuť"
                                download
                            >
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="files"
                        identificator="{{ $file['slug'] }}"
                    />
                </tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
