@extends('backend._layouts.app')

@section('title', __('backend-texts.users.title'))
@section('meta_description', __('backend-texts.users.description'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('users.show', false, $user, $user->name) }}
@stop

@php
    $controlerName = 'users';
    $columns = 5;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $user ) ) {
        $typeForm = 'show';
        $identificator = $user->id;
        $createdInfo = $user->created_at;
        $updatedInfo = $user->updated_at;
    }
@endphp

@section('content')

    <x-backend.form     controlerName="{{ $controlerName }}" columns="{{ $columns }}"
                    typeForm="{{ $typeForm }}"  identificator="{{ $identificator }}"
                    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}">

        <div class="row d-flex justify-content-between">
            <div class="col-4">
                {{-- <dt>Avatar</dt> --}}
                    <dd>
                        <img class="profile-user-img img-fluid img-circle w-100" src="{{ $user->getFirstMediaUrl('avatar', 'crop') ?: "http://via.placeholder.com/100x100" }}" alt="Avatar: {{ $user->name }}">
                    </dd>

            </div>
            <div class="col-7">

                <dt>Meno</dt>
                    <dd>{{ $user->name }}</dd>
                <dt>E-mail</dt>
                    <dd>{{ $user->email }}</dd>
                <dt>Nick:</dt>
                    <dd>{{ $user->nick }}</dd>
                <dt>Roly</dt>
                    <dd>
                        <ul class="list-unstyled">
                            @foreach ($user->roles as $role)
                                <li>
                                    {{ $role->name }}
                                </li>
                            @endforeach
                        </ul>
                    </dd>
                <dt>Povolenia:</dt>
                    <dd>{{ $user->permissions_count != 0 ? $user->permissions_count : 'žiadne' }}</dd>
            </div>
        </div>
        @role('Super Administrátor')
            <hr>
            <div class="row">
                @foreach ($user->permissions as $permission )
                    <span class="badge bg-gradient-orange m-1 px-2">{{ $permission->name }}</span>
                @endforeach
            </div>
        @endrole

    </x-backend.form>

@endsection
