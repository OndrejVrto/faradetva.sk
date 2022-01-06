@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.roles_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.roles_description') )
@section('content_header', config('farnost-detva.admin_texts.roles_header') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('roles.index') }}
@stop

@section('content')
	<x-admin-table
		columns="3"
		createTitle="Pridať rolu"
		createLink="{{ route('roles.create') }}"
		paginator="{{ $roles->onEachSide(1)->links() }}"
		>

		<x-slot name="table_header">
			<x-admin-table.th width="1%">#</x-admin-table.th>
			<x-admin-table.th>Meno</x-admin-table.th>
			<x-admin-table.th-actions/>
		</x-slot>

		<x-slot name="table_body">
			@foreach($roles as $role)
			<tr>
				<x-admin-table.td>{{$role->id}}</x-admin-table.td>
				<x-admin-table.td class="text-wrap text-break">{{$role->name}}</x-admin-table.td>

				<x-admin-table.td-actions
					editLink="{{ route('roles.edit', $role->id)}}"
					deleteLink="{{ route('roles.destroy', $role->id)}}"
				/>
			</tr>
			@endforeach
		</x-slot>

	</x-admin-table>
@endsection
