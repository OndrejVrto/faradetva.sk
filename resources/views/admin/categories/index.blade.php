@extends('admin._layouts.app')

@section('title', __('backend-texts.categories.title'))
@section('meta_description', __('backend-texts.categories.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('categories.index') }}
@stop

@section('content')
    <x-admin.table
        columns="7"
        controlerName="categories"
        createBtn="Pridať novú kategóriu"
        paginator="{{ $categories->onEachSide(1)->links() }}"
        >

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th width="30%">Názov Kategórie</x-admin.table.th>
            <x-admin.table.th>Popis</x-admin.table.th>
            <x-admin.table.th-actions/>
        </x-slot>

        <x-slot:table_body>
            @foreach($categories as $category)
                <x-admin.table.tr trashed="{{ $category->trashed() }}">

                    {{-- <x-admin.table.td>{{$category->id}}</x-admin.table.td> --}}
                    <x-admin.table.td class="text-wrap text-break">{{$category->title}}</x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{$category->description}}</x-admin.table.td>

                    @if ( $category->id != 1 OR auth()->user()->id == 1 )
                        <x-admin.table.td-actions
                            controlerName="categories"
                            identificator="{{ $category->slug }}"
                            trashed="{{ $category->trashed() }}"
                            trashedID="{{ $category->id }}"
                        />
                    @else
                        <td colspan=2></td>
                    @endif

                </x-admin.table.tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
