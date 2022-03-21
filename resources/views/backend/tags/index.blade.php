@extends('backend._layouts.app')

@section('title', __('backend-texts.tags.title'))
@section('meta_description', __('backend-texts.tags.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('tags.index') }}
@stop

@section('content')
    <x-backend.table
        columns="7"
        controlerName="tags"
        createBtn="Pridať nové kľúčové slovo"
        paginator="{{ $tags->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th width="20%">Kľúčové slovo</x-backend.table.th>
            <x-backend.table.th>Popis</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($tags as $tag)
            <tr>
                {{-- <x-backend.table.td>{{$tag->id}}</x-backend.table.td> --}}
                <x-backend.table.td class="text-wrap text-break">{{$tag->title}}</x-backend.table.td>
                <x-backend.table.td class="text-wrap text-break">{{$tag->description}}</x-backend.table.td>

                <x-backend.table.td-actions
                    controlerName="tags"
                    identificator="{{ $tag->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
