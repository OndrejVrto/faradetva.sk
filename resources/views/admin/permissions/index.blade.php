@extends('admin._layouts.app')

@section('title', __('backend-texts.permissions.title'))
@section('meta_description', __('backend-texts.permissions.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('permissions.index') }}
@stop

@section('content')
    <x-admin.table
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
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th>Názov povolenia</x-admin.table.th>
            {{-- <x-admin.table.th>Brána</x-admin.table.th> --}}
            <x-admin.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($permissions as $permission)
            <tr>
                {{-- <x-admin.table.td>{{$permission->id}}</x-admin.table.td> --}}
                <x-admin.table.td class="text-wrap text-break">{{$permission->name}}</x-admin.table.td>
                {{-- <x-admin.table.td class="text-wrap text-break">{{$permission->guard_name}}</x-admin.table.td> --}}

                <x-admin.table.td-actions
                    controlerName="permissions"
                    identificator="{{ $permission->id }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
