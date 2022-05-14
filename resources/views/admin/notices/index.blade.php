@extends('admin._layouts.app')

@section('title', __('backend-texts.'.$controller.'.title'))
@section('meta_description', __('backend-texts.'.$controller.'.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render($controller.'.index') }}
@stop

@section('content')
    <x-admin.table
        columns="11"
        controlerName="{{ $controller }}"
        createBtn="Pridať oznam"
        paginator="{{ $notices->onEachSide(1)->links() }}"
    >

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th-check-active/>
            {{-- <x-admin.table.th width="15%" class="text-center">Typ oznamu</x-admin.table.th> --}}
            <x-admin.table.th width="20%">Čas zverejnenia</x-admin.table.th>
            <x-admin.table.th class="d-none d-md-table-cell">Názov oznamu</x-admin.table.th>
            <x-admin.table.th width="40%">Názov súboru</x-admin.table.th>
            <x-admin.table.th-actions/>
        </x-slot>

        <x-slot:table_body>
            @foreach($notices as $notice)
                <x-admin.table.tr trashed="{{ $notice->trashed() }}">

                    {{-- <x-admin.table.td>{{$notice->id}}</x-admin.table.td> --}}
                    <x-admin.table.td-check-active check="{{ $notice->active }}"/>
                    {{-- <x-admin.table.td class="text-center">{{ __('messages.'.$notice->type_model.'Notice') }}</x-admin.table.td> --}}
                    <x-admin.table.td class="small">
                            <span class="text-muted mr-2">Publikovať od:</span>
                            <span class="text-success text-bold">{{$notice->published_at}}</span>
                        <br>
                            <span class="text-muted mr-2">Publikovať do:</span>
                            <span class="text-danger text-bold">{{$notice->unpublished_at}}</span>
                    </x-admin.table.td>
                    <x-admin.table.td class="d-none d-md-table-cell text-wrap text-break text-bold">{{ $notice->title }}</x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{ $notice->media_file_name }}</x-admin.table.td>
                    <x-admin.table.td class="text-center">
                        <a  href="{{ url($notice->getFirstMediaUrl($notice->collectionName) ?: '#') }}"
                            class="w35 ml-1 btn btn-outline-secondary btn-sm btn-flat"
                            title="Stiahnuť prílohu"
                            download
                        >
                            <i class="fas fa-download"></i>
                        </a>
                    </x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="{{ $controller }}"
                        identificator="{{ $notice->slug }}"
                        trashed="{{ $notice->trashed() }}"
                        trashedID="{{ $notice->id }}"
                    />

                </x-admin.table.tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
