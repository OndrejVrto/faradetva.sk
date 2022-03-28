@extends('backend._layouts.app')

@section('title', __('backend-texts.categories.title'))
@section('meta_description', __('backend-texts.categories.description'))

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
            <x-backend.table.th width="30%">Názov Kategórie</x-backend.table.th>
            <x-backend.table.th>Popis</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($categories as $category)
                <x-backend.table.tr trashed="{{ $category->trashed() }}">

                    {{-- <x-backend.table.td>{{$category->id}}</x-backend.table.td> --}}
                    <x-backend.table.td class="text-wrap text-break">{{$category->title}}</x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break">{{$category->description}}</x-backend.table.td>

                    @if ( $category->id != 1 OR auth()->user()->id == 1 )
                        <x-backend.table.td-actions
                            controlerName="categories"
                            identificator="{{ $category->slug }}"
                            trashed="{{ $category->trashed() }}"
                            trashedID="{{ $category->id }}"
                        />
                    @else
                        <td colspan=2></td>
                    @endif

                </x-backend.table.tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
