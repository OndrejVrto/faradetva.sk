@extends('backend._layouts.app')

@section('title', __('backend-texts.users.title'))
@section('meta_description', __('backend-texts.users.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('users.index') }}
@stop

@section('content')
    <x-backend.table
        columns="12"
        controlerName="users"
        createBtn="Pridať uživateľa"
        paginator="{{ $users->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th-check-active/>
            <x-backend.table.th width="1%" class="text-center">Avatar</x-backend.table.th>
            <x-backend.table.th width="20%">Meno užívateľa</x-backend.table.th>
            <x-backend.table.th width="25%" class="d-none d-md-table-cell">Email</x-backend.table.th>
            <x-backend.table.th width="15%" class="d-none d-lg-table-cell">Nick</x-backend.table.th>
            <x-backend.table.th width="10%">Roly</x-backend.table.th>
            <x-backend.table.th width="10%" class="text-center d-none d-md-table-cell">Povolenia</x-backend.table.th>
            <x-backend.table.th-actions />
        </x-slot>

        <x-slot name="table_body">
            @foreach($users as $user)
                <x-backend.table.tr trashed="{{ $user->trashed() }}">

                    {{-- <x-backend.table.td>{{$user->id}}</x-backend.table.td> --}}
                    <x-backend.table.td-check-active check="{{ $user->active }}"/>
                    <x-backend.table.td class="text-center">
                        <img src="{{ $user->getFirstMediaUrl($user->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/40x40" }}"
                        class="img-fluid img-circle"
                        alt="Fotografia Avatara: {{ $user->name }}"/>
                    </x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break">{{$user->name}}</x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break d-none d-md-table-cell">{{$user->email}}</x-backend.table.td>
                    <x-backend.table.td class="d-none d-lg-table-cell">{{$user->nick}}</x-backend.table.td>
                    <x-backend.table.td>
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
                    </x-backend.table.td>
                    <x-backend.table.td class="text-center d-none d-md-table-cell">
                        @if( $user->permissions_count != 0 )
                            <span class="badge bg-orange px-2 py-1">{{ $user->permissions_count }}</span>
                        @endif
                    </x-backend.table.td>
                    <x-backend.table.td class="text-right">
                        <div class="d-inline-flex">
                            @if ( !is_impersonating() AND !$user->trashed() )
                                @canImpersonate()
                                    @if ($user->canBeImpersonated() and $user->id != auth()->user()->id )
                                        <a  href="{{ route('impersonate', $user->id) }}"
                                            class="w35 ml-1 btn btn-outline-dark btn-sm btn-flat"
                                            title="Stelesniť sa">
                                            <i class="fas fa-people-arrows"></i>
                                        </a>
                                    @endif
                                @endCanImpersonate
                            @endif
                            <a  href="{{ url($user->getFirstMediaUrl($user->collectionName) ?: '#') }}"
                                class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                                title="Stiahnuť fotku"
                                download
                            >
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </x-backend.table.td>
                    @if ( $user->id > 2 OR auth()->user()->id == 1 )
                        <x-backend.table.td-actions
                            controlerName="users"
                            identificator="{{ $user->slug }}"
                            trashed="{{ $user->trashed() }}"
                            trashedID="{{ $user->id }}"
                        />
                    @else
                        <td colspan=2></td>
                    @endif

                </x-backend.table.tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection

