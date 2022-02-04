@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.notices_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.notices_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('notices.index') }}
@stop

@section('content')
    <x-admin-table
        columns="10"
        controlerName="notices"
        createBtn="Pridať oznam"
        paginator="{{ $notices->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th-check-active/>
            <x-admin-table.th width="20%">Čas zverejnenia</x-admin-table.th>
            <x-admin-table.th class="d-none d-md-table-cell">Názov oznamu</x-admin-table.th>
            <x-admin-table.th width="40%">Názov súboru</x-admin-table.th>
            <x-admin-table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($notices as $notice)
            <tr>
                {{-- <x-admin-table.td>{{$notice->id}}</x-admin-table.td> --}}
                <x-admin-table.td-check-active check="{{ $notice->active }}"/>

                <x-admin-table.td class="small">
                        <span class="text-muted mr-2">Publikovať od:</span>
                        <span class="text-success text-bold">{{$notice->published_at}}</span>
                    <br>
                        <span class="text-muted mr-2">Publikovať do:</span>
                        <span class="text-danger text-bold">{{$notice->unpublished_at}}</span>
                </x-admin-table.td>

                <x-admin-table.td class="d-none d-md-table-cell text-wrap text-break text-bold">{{ $notice->title }}</x-admin-table.td>

                <x-admin-table.td class="text-wrap text-break">{{ $notice->media_file_name }}</x-admin-table.td>

                <x-admin-table.td-actions
                    controlerName="notices"
                    identificator="{{ $notice->id }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
