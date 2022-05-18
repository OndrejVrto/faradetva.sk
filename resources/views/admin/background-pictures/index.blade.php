@extends('admin._layouts.app')

@section('title', __('backend-texts.background-pictures.title'))
@section('meta_description', __('backend-texts.background-pictures.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('background-pictures.index') }}
@stop

@section('content')
    <x-admin.table
        columns="10"
        controlerName="background-pictures"
        createBtn="Pridať nový obrázok pozadia"
        paginator="{{ $backgroundPictures->onEachSide(1)->links() }}"
        >

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th width="30%" class="text-center">Obrázok pozadia</x-admin.table.th>
            <x-admin.table.th>Pracovný názov</x-admin.table.th>
            <x-admin.table.th>Popis</x-admin.table.th>
            <x-admin.table.th-actions />
        </x-slot>

        <x-slot:table_body>
            @foreach($backgroundPictures as $picture)
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
                        controlerName="background-pictures"
                        identificator="{{ $picture->slug }}"
                    />

                </tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
