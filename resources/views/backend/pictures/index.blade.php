@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.pictures_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.pictures_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('pictures.index') }}
@stop

@section('content')
    <x-admin-table
        columns="9"
        controlerName="pictures"
        createBtn="Pridať nový obrázok"
        paginator="{{ $pictures->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th width="20%" class="text-center">Obrázok</x-admin-table.th>
            <x-admin-table.th>Názov obrázka</x-admin-table.th>
            <x-admin-table.th-actions colspan="3"/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($pictures as $picture)
            <tr>
                {{-- <x-admin-table.td>{{$picture->id}}</x-admin-table.td> --}}
                <x-admin-table.td class="text-center">
                    <img src="{{ $picture->getFirstMediaUrl($picture->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/100x100" }}"
                    class="img-fluid px-3"
                    alt="picture: {{ $picture->title }}"/>
                </x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{$picture->slug}}</x-admin-table.td>
                <x-admin-table.td-actions
                    controlerName="pictures"
                    identificator="{{ $picture->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
