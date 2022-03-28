@extends('backend._layouts.app')

@section('title', __('backend-texts.pictures.title'))
@section('meta_description', __('backend-texts.pictures.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('pictures.index') }}
@stop

@section('content')
    <x-backend.table
        columns="9"
        controlerName="pictures"
        createBtn="Pridať nový obrázok"
        paginator="{{ $pictures->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th width="20%" class="text-center">Obrázok</x-backend.table.th>
            <x-backend.table.th>Názov obrázka</x-backend.table.th>
            <x-backend.table.th-actions />
        </x-slot>

        <x-slot name="table_body">
            @foreach($pictures as $picture)
                <tr>

                    {{-- <x-backend.table.td>{{$picture->id}}</x-backend.table.td> --}}
                    <x-backend.table.td class="text-center">
                        <img src="{{ $picture->getFirstMediaUrl($picture->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/100x100" }}"
                        class="img-fluid px-3"
                        alt="picture: {{ $picture->title }}"/>
                    </x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break">{{$picture->slug}}</x-backend.table.td>
                    <x-backend.table.td class="text-center">
                        <a  href="{{ url($picture->getFirstMediaUrl($picture->collectionName) ?: '#') }}"
                            class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                            title="Stiahnuť pôvodný obrázok"
                            download
                        >
                            <i class="fas fa-download"></i>
                        </a>
                    </x-backend.table.td>
                    <x-backend.table.td-actions
                        controlerName="pictures"
                        identificator="{{ $picture->slug }}"
                    />

                </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
