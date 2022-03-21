@extends('backend._layouts.app')

@section('title', __('backend-texts.permissions.title'))
@section('meta_description', __('backend-texts.permissions.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('permissions.index') }}
@stop

@section('content')
    <x-backend.table
        controlerName="permissions"
        columns="6"
        createBtn="Pridať povolenie"
        paginator="{{ $permissions->onEachSide(2)->links() }}"
        >

        <x-slot name="createNote">
            Mená povolení priraďuj podľa názvov v route.php
            <br>
            Alebo použi príkaz na pridanie všetkých názvov automaticky:
            <br>
            <span class="text-bold text-danger">php artisan permission:create-permission-routes</span>
        </x-slot>

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th>Názov povolenia</x-backend.table.th>
            {{-- <x-backend.table.th>Brána</x-backend.table.th> --}}
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($permissions as $permission)
            <tr>
                {{-- <x-backend.table.td>{{$permission->id}}</x-backend.table.td> --}}
                <x-backend.table.td class="text-wrap text-break">{{$permission->name}}</x-backend.table.td>
                {{-- <x-backend.table.td class="text-wrap text-break">{{$permission->guard_name}}</x-backend.table.td> --}}

                <x-backend.table.td-actions
                    controlerName="permissions"
                    identificator="{{ $permission->id }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
