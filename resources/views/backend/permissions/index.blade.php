@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.permissions_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.permissions_description') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('permissions.index') }}
@stop

@section('content')
	<x-admin-table
		controlerName="permissions"
		columns="6"
		createBtn="Pridať povolenie"
		>

		<x-slot name="createNote">
			Mená povolení priraďuj podľa názvov v route.php
			<br>
			Alebo použi príkaz na pridanie všetkých názvov automaticky:
			<br>
			<span class="text-bold text-danger">php artisan permission:create-permission-routes</span>
		</x-slot>

		<x-slot name="table_header">
			<x-admin-table.th width="1%">#</x-admin-table.th>
			<x-admin-table.th width="60%">Názov povolenia</x-admin-table.th>
			<x-admin-table.th>Brána</x-admin-table.th>
			<x-admin-table.th-actions/>
		</x-slot>

		<x-slot name="table_body">
			@foreach($permissions as $permission)
			<tr>
				<x-admin-table.td>{{$permission->id}}</x-admin-table.td>
				<x-admin-table.td class="text-wrap text-break">{{$permission->name}}</x-admin-table.td>
				<x-admin-table.td class="text-wrap text-break">{{$permission->guard_name}}</x-admin-table.td>

				<x-admin-table.td-actions
					editLink="{{ route('permissions.edit', $permission->id)}}"
					deleteLink="{{ route('permissions.destroy', $permission->id)}}"
				/>
			</tr>
			@endforeach
		</x-slot>

	</x-admin-table>
@endsection
