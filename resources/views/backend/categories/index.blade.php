@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.categories_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.categories_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('categories.index') }}
@stop

@section('content')
    <x-admin-table
        columns="7"
        controlerName="categories"
        createBtn="Pridať novú kategóriu"
        paginator="{{ $categories->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th width="20%">Názov Kategórie</x-admin-table.th>
            <x-admin-table.th>Popis</x-admin-table.th>
            <x-admin-table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($categories as $category)
            <tr>
                {{-- <x-admin-table.td>{{$category->id}}</x-admin-table.td> --}}
                <x-admin-table.td class="text-wrap text-break">{{$category->title}}</x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{$category->description}}</x-admin-table.td>

                <x-admin-table.td-actions
                    editLink="{{ route('categories.edit', $category->slug)}}"
                    deleteLink="{{ route('categories.destroy', $category->slug)}}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
