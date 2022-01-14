@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.tags_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.tags_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('tags.index') }}
@stop

@section('content')
    <x-admin-table
        columns="7"
        controlerName="tags"
        createBtn="Pridať nové kľúčové slovo"
        paginator="{{ $tags->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th width="20%">Kľúčové slovo</x-admin-table.th>
            <x-admin-table.th>Popis</x-admin-table.th>
            <x-admin-table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($tags as $tag)
            <tr>
                {{-- <x-admin-table.td>{{$tag->id}}</x-admin-table.td> --}}
                <x-admin-table.td class="text-wrap text-break">{{$tag->title}}</x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{$tag->description}}</x-admin-table.td>

                <x-admin-table.td-actions
                    editLink="{{ route('tags.edit', $tag->slug)}}"
                    deleteLink="{{ route('tags.destroy', $tag->slug)}}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
