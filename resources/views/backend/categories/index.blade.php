@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.categories_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.categories_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('categories.index') }}
@stop

@section('content')
    <x-backend.table
        columns="7"
        controlerName="categories"
        createBtn="Pridať novú kategóriu"
        paginator="{{ $categories->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th width="20%">Názov Kategórie</x-backend.table.th>
            <x-backend.table.th>Popis</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($categories as $category)
            <tr>
                {{-- <x-backend.table.td>{{$category->id}}</x-backend.table.td> --}}
                <x-backend.table.td class="text-wrap text-break">{{$category->title}}</x-backend.table.td>
                <x-backend.table.td class="text-wrap text-break">{{$category->description}}</x-backend.table.td>

                <x-backend.table.td-actions
                    controlerName="categories"
                    identificator="{{ $category->slug }}"
                />

            </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
