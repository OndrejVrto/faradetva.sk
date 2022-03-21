@extends('backend._layouts.app')

@section('title', __('backend-texts.'.$controller.'.title'))
@section('meta_description', __('backend-texts.'.$controller.'.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render($controller.'.index') }}
@stop

@section('content')
    <x-backend.table
        columns="11"
        controlerName="{{ $controller }}"
        createBtn="Pridať oznam"
        paginator="{{ $notices->onEachSide(1)->links() }}"
        >
        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th-check-active/>
            <x-backend.table.th width="15%" class="text-center">Typ oznamu</x-backend.table.th>
            <x-backend.table.th width="20%">Čas zverejnenia</x-backend.table.th>
            <x-backend.table.th class="d-none d-md-table-cell">Názov oznamu</x-backend.table.th>
            <x-backend.table.th width="40%">Názov súboru</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($notices as $notice)
                <tr>
                    {{-- <x-backend.table.td>{{$notice->id}}</x-backend.table.td> --}}
                    <x-backend.table.td-check-active check="{{ $notice->active }}"/>

                    <x-backend.table.td class="text-center">{{ __('messages.'.$notice->type_model.'Notice') }}</x-backend.table.td>

                    <x-backend.table.td class="small">
                            <span class="text-muted mr-2">Publikovať od:</span>
                            <span class="text-success text-bold">{{$notice->published_at}}</span>
                        <br>
                            <span class="text-muted mr-2">Publikovať do:</span>
                            <span class="text-danger text-bold">{{$notice->unpublished_at}}</span>
                    </x-backend.table.td>

                    <x-backend.table.td class="d-none d-md-table-cell text-wrap text-break text-bold">{{ $notice->title }}</x-backend.table.td>

                    <x-backend.table.td class="text-wrap text-break">{{ $notice->media_file_name }}</x-backend.table.td>

                    <x-backend.table.td-actions
                        controlerName="{{ $controller }}"
                        identificator="{{ $notice->slug }}"
                    />
                </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
