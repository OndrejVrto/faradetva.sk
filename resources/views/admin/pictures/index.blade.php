@extends('admin._layouts.app')

@section('title', __('backend-texts.pictures.title'))
@section('meta_description', __('backend-texts.pictures.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('pictures.index') }}
@stop

@section('content')
    <x-admin.table
        columns="10"
        controlerName="pictures"
        createBtn="Pridať nový obrázok"
        paginator="{{ $pictures->onEachSide(3)->links() }}"
        >

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th width="20%" class="text-center">Obrázok</x-admin.table.th>
            <x-admin.table.th width="15%" class="text-center">Rozmery</x-admin.table.th>
            <x-admin.table.th>Pracovný názov</x-admin.table.th>
            <x-admin.table.th>Popis</x-admin.table.th>
            <x-admin.table.th-actions />
        </x-slot>

        <x-slot:table_body>
            @foreach($pictures as $picture)
                <tr>

                    {{-- <x-admin.table.td>{{$picture->id}}</x-admin.table.td> --}}
                    <x-admin.table.td class="text-center">
                        {{-- <img src="{{ $picture->getFirstMediaUrl($picture->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/100x100" }}" --}}
                        <img src="{{ $picture->getFirstMediaUrl($picture->collectionName, 'crop-thumb') }}"
                            class="img-fluid px-3"
                            alt="picture: {{ $picture->title }}"
                            title="{{ $picture->title }}"
                        />
                    </x-admin.table.td>
                    <x-admin.table.td>
                        <span class="small mr-2">Šírka:</span>{{ $picture->crop_output_width }}px
                        <br>
                        <span class="small mr-2">Výška:</span>{{ $picture->crop_output_height }}px
                        @if ($picture->crop_output_exact_dimensions)
                            <br>
                            <span class="small text-danger">Presné rozmery</span>
                        @endif
                    </x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{$picture->slug}}</x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{$picture->source->source_description}}</x-admin.table.td>
                    <x-admin.table.td class="text-center">
                        <a  href="{{ url($picture->getFirstMediaUrl($picture->collectionName) ?: '#') }}"
                            class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                            title="Stiahnuť pôvodný obrázok"
                            download
                        >
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="pictures"
                        identificator="{{ $picture->slug }}"
                    />

                </tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
