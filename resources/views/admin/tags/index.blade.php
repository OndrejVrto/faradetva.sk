@extends('admin._layouts.app')

@section('title', __('backend-texts.tags.title'))
@section('meta_description', __('backend-texts.tags.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('tags.index') }}
@stop

@section('content')
    <x-admin.table
        columns="7"
        controlerName="tags"
        createBtn="Pridať nové kľúčové slovo"
        paginator="{{ $tags->onEachSide(1)->links() }}"
    >

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th width="20%">Kľúčové slovo</x-admin.table.th>
            <x-admin.table.th>Popis</x-admin.table.th>
            <x-admin.table.th-actions/>
        </x-slot>

        <x-slot:table_body>
            @foreach($tags as $tag)
                <x-admin.table.tr trashed="{{ $tag->trashed() }}">

                    {{-- <x-admin.table.td>{{$tag->id}}</x-admin.table.td> --}}
                    <x-admin.table.td class="text-wrap text-break">{{$tag->title}}</x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{$tag->description}}</x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="tags"
                        identificator="{{ $tag->slug }}"
                        trashed="{{ $tag->trashed() }}"
                        trashedID="{{ $tag->id }}"
                    />

                </x-admin.table.tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
