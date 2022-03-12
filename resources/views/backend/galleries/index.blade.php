@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.galleries_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.galleries_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('galleries.index') }}
@stop

@section('content')
    <x-backend.table
        columns="9"
        controlerName="galleries"
        createBtn="Pridať novú galériu"
        paginator="{{ $galleries->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th width="20%" class="text-center">Prvý obrázok</x-backend.table.th>
            <x-backend.table.th width="50%">Pracovný názov</x-backend.table.th>
            <x-backend.table.th width="15%" class="text-center">Obrázkov</x-backend.table.th>
            <x-backend.table.th-actions colspan="3"/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($galleries as $gallery)
            <tr>
                {{-- <x-backend.table.td>{{$gallery->id}}</x-backend.table.td> --}}
                <x-backend.table.td class="text-center">
                    <img src="{{ $gallery->getFirstMediaUrl($gallery->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/100x100" }}"
                    class="img-fluid px-3"
                    alt="Album {{ $gallery->title }}"/>
                </x-backend.table.td>
                <x-backend.table.td class="text-wrap text-break text-bold">{{ $gallery->slug }}</x-backend.table.td>
                <x-backend.table.td class="text-center">
                    <span class="badge bg-orange px-2 py-1">{{ $gallery->picture_count }}</span>
                </x-backend.table.td>
                <x-backend.table.td-actions
                    controlerName="galleries"
                    identificator="{{ $gallery->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
