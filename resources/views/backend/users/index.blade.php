@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.users_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.users_description') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('users.index') }}
@stop

@section('content')
	<x-admin-table
		columns="10"
		controlerName="users"
		createBtn="Pridať uživateľa"
		paginator="{{ $users->onEachSide(1)->links() }}"
		>

		<x-slot name="table_header">
			<x-admin-table.th width="1%">#</x-admin-table.th>
			<x-admin-table.th width="15%" class="d-none d-lg-table-cell">Nick</x-admin-table.th>
			{{-- TODO: Avatar --}}
			{{-- <x-admin-table.th width="10%" class="text-center">Avatar</x-admin-table.th> --}}
			<x-admin-table.th width="20%">Email</x-admin-table.th>
			<x-admin-table.th width="25%">Meno užívateľa</x-admin-table.th>
			<x-admin-table.th width="10%">Roly</x-admin-table.th>
			<x-admin-table.th width="10%" class="text-center">Povolenia</x-admin-table.th>
			<x-admin-table.th-actions/>
		</x-slot>

		<x-slot name="table_body">
			@foreach($users as $user)
			<tr>
				<x-admin-table.td>{{$user->id}}</x-admin-table.td>
				<x-admin-table.td class="d-none d-lg-table-cell">{{$user->nick}}</x-admin-table.td>
				{{-- <x-admin-table.td class="text-center">
					<img src="{{ $user->getFirstMediaUrl('user', 'avatar-thumb') ?: "http://via.placeholder.com/60x60" }}"
					class="img-fluid"
					alt="Fotografia Avatara: {{ $user->name }}"/>
				</x-admin-table.td> --}}
				<x-admin-table.td class="text-wrap text-break">{{$user->email}}</x-admin-table.td>
				<x-admin-table.td class="text-wrap text-break">{{$user->name}}</x-admin-table.td>
				<x-admin-table.td>
					@foreach($user->roles as $role)
						@php
							$colors = ['info', 'purple', 'warning', 'success', 'secondary', 'primary', 'indigo', 'pink'];
							$color = $role->id == 1 ? 'danger' : $colors[(int)$role->id % count($colors)];
						@endphp
						<a href="{{ route('roles.edit', $role->id) }}">
							<span class="badge bg-{{ $color }} px-2 py-1">{{ $role->name }}</span>
						</a>
					@endforeach
				</x-admin-table.td>
				<x-admin-table.td class="text-center">
					{{-- TODO: počet rolí --}}
					<span class="badge bg-orange px-2 py-1">Počet TODO</span>
				</x-admin-table.td>
				<x-admin-table.td-actions
					editLink="{{ route('users.edit', $user->id)}}"
					deleteLink="{{ route('users.destroy', $user->id)}}"
				/>
			</tr>
			@endforeach
		</x-slot>

	</x-admin-table>
@endsection

