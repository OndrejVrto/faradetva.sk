@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.roles_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.roles_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('roles.index') }}
@stop

@section('content')
    <x-backend.table
        columns="6"
        controlerName="roles"
        createBtn="Pridať rolu"
        paginator="{{ $roles->onEachSide(1)->links() }}"
        >

        <x-slot name="createNote">
            Povolenia sa dajú priradiť každej roli, aj samostatnému uživateľovi.
        </x-slot>

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th>Meno</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($roles as $role)
            <tr>
                {{-- <x-backend.table.td>{{$role->id}}</x-backend.table.td> --}}
                <x-backend.table.td class="text-wrap text-break">{{$role->name}}</x-backend.table.td>

                <x-backend.table.td-actions
                    controlerName="roles"
                    identificator="{{ $role->id }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
