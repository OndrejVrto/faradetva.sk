@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.users_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.users_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('users.index') }}
@stop

@section('content')
    <x-admin-table
        columns="12"
        controlerName="users"
        createBtn="Pridať uživateľa"
        paginator="{{ $users->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th-check-active/>
            <x-admin-table.th width="1%" class="text-center">Avatar</x-admin-table.th>
            <x-admin-table.th width="20%">Meno užívateľa</x-admin-table.th>
            <x-admin-table.th width="25%" class="d-none d-md-table-cell">Email</x-admin-table.th>
            <x-admin-table.th width="15%" class="d-none d-lg-table-cell">Nick</x-admin-table.th>
            <x-admin-table.th width="10%">Roly</x-admin-table.th>
            <x-admin-table.th width="10%" class="text-center d-none d-md-table-cell">Povolenia</x-admin-table.th>
            <x-admin-table.th-actions colspan="4"/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($users as $user)
                <tr>
                    {{-- <x-admin-table.td>{{$user->id}}</x-admin-table.td> --}}
                    <x-admin-table.td-check-active check="{{ $user->active }}"/>
                    <x-admin-table.td class="text-center">
                        <img src="{{ $user->getFirstMediaUrl($user->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/40x40" }}"
                        class="img-fluid img-circle"
                        alt="Fotografia Avatara: {{ $user->name }}"/>
                    </x-admin-table.td>
                    <x-admin-table.td class="text-wrap text-break">{{$user->name}}</x-admin-table.td>
                    <x-admin-table.td class="text-wrap text-break d-none d-md-table-cell">{{$user->email}}</x-admin-table.td>
                    <x-admin-table.td class="d-none d-lg-table-cell">{{$user->nick}}</x-admin-table.td>
                    <x-admin-table.td>
                        @foreach($user->roles as $role)
                            @php
                                $colors = ['info', 'purple', 'warning', 'success', 'secondary', 'primary', 'indigo', 'pink'];
                                $color = $role->id == 1 ? 'danger' : $colors[(int)$role->id % count($colors)];
                            @endphp
                            @can('roles.edit')
                                <a href="{{ route('roles.edit', $role->id) }}">
                            @endcan
                                <span class="badge bg-{{ $color }} px-2 py-1">{{ $role->name }}</span>
                            @can('roles.edit')
                                </a>
                            @endcan
                        @endforeach
                    </x-admin-table.td>
                    <x-admin-table.td class="text-center d-none d-md-table-cell">
                        @if( $user->permissions_count != 0 )
                            <span class="badge bg-orange px-2 py-1">{{ $user->permissions_count }}</span>
                        @endif
                    </x-admin-table.td>
                    <x-admin-table.td class="text-center d-none d-md-table-cell">
                        @if (!is_impersonating())
                            @canImpersonate()
                                @if ($user->canBeImpersonated() and $user->id != auth()->user()->id )
                                    <a  href="{{ route('impersonate', $user->id) }}"
                                        class="btn btn-outline-warning btn-sm btn-flat"
                                        title="Stelesniť sa">
                                        <i class="fas fa-people-arrows"></i>
                                    </a>
                                @endif
                            @endCanImpersonate
                        @endif
                    </x-admin-table.td>
                    @if ( $user->id != 1 OR auth()->user()->id == 1 )
                        <x-admin-table.td-actions
                            controlerName="users"
                            identificator="{{ $user->id }}"
                        />
                    @else
                        <td colspan=3></td>
                    @endif
                </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection

