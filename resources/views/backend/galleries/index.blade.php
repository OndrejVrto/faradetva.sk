@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.galleries_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.galleries_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('galleries.index') }}
@stop

@section('content')
    <x-admin-table
        columns="7"
        controlerName="galleries"
        createBtn="Pridať novú galériu"
        paginator="{{ $galleries->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th  class="text-center">Prvý obrázok</x-admin-table.th>
            <x-admin-table.th width="50%">Pracovný názov</x-admin-table.th>
            <x-admin-table.th width="15%" class="text-center">Obrázkov</x-admin-table.th>
            <x-admin-table.th-actions colspan="3"/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($galleries as $gallery)
            <tr>
                {{-- <x-admin-table.td>{{$gallery->id}}</x-admin-table.td> --}}
                <x-admin-table.td class="text-center">
                    <img src="{{ $gallery->getFirstMediaUrl($gallery->collectionPicture, 'crop-thumb') ?: "http://via.placeholder.com/100x100" }}"
                    class="img-fluid px-3"
                    alt="Album {{ $gallery->title }}"/>
                </x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break text-bold">{{ $gallery->slug }}</x-admin-table.td>
                <x-admin-table.td class="text-center">
                    <span class="badge bg-orange px-2 py-1">{{ $gallery->picture_count }}</span>
                </x-admin-table.td>
                <x-admin-table.td-actions
                    controlerName="galleries"
                    identificator="{{ $gallery->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
