@extends('admin._layouts.app')

@section('title', __('backend-texts.roles.title'))
@section('meta_description', __('backend-texts.roles.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('roles.index') }}
@stop

@section('content')
    <x-admin.table
        columns="6"
        controlerName="roles"
        createBtn="Pridať rolu"
        paginator="{{ $roles->onEachSide(1)->links() }}"
        >

        <x-slot:createNote>
            Povolenia sa dajú priradiť každej roli, aj samostatnému uživateľovi.
        </x-slot>

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th>Meno</x-admin.table.th>
            <x-admin.table.th-actions/>
        </x-slot>

        <x-slot:table_body>
            @foreach($roles as $role)
            <tr>
                {{-- <x-admin.table.td>{{$role->id}}</x-admin.table.td> --}}
                <x-admin.table.td class="text-wrap text-break">{{$role->name}}</x-admin.table.td>

                <x-admin.table.td-actions
                    controlerName="roles"
                    identificator="{{ $role->id }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
