@extends('backend._layouts.app')

@section('title', __('backend-texts.sliders.title'))
@section('meta_description', __('backend-texts.sliders.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('sliders.index') }}
@stop

@section('content')
    <x-backend.table
        columns="9"
        controlerName="sliders"
        createBtn="Pridať nový obrázok s myšlienkou"
        createLink="{{ route('sliders.create') }}"
        paginator="{{ $sliders->onEachSide(1)->links() }}"
        >

        <x-slot name="createNote">
            Na stránke sa zobrazujú iba tri náhodné obrázky!
            <br>
            Pre fungovanie musia byť vložené minimálne dva obrázky.
        </x-slot>

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th-check-active/>
            <x-backend.table.th width="10%" class="text-center">Obrázok</x-backend.table.th>
            <x-backend.table.th width="25%">Myšlienka</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($sliders as $slider)
                <x-backend.table.tr trashed="{{ $slider->trashed() }}">

                    {{-- <x-backend.table.td>{{$slider->id}}</x-backend.table.td> --}}
                    <x-backend.table.td-check-active check="{{ $slider->active }}"/>
                    <x-backend.table.td class="text-center">
                        <img src="{{ $slider->getFirstMediaUrl($slider->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/240x100" }}"
                        class="img-fluid"
                        alt="Obrázok: {{ $slider->full_heading }}"/>
                    </x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break">{{$slider->teaser}}</x-backend.table.td>
                    <x-backend.table.td class="text-center">
                        <a  href="{{ url($slider->getFirstMediaUrl($slider->collectionName) ?: '#') }}"
                            class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                            title="Stiahnuť pôvodný obrázok"
                            download
                        >
                            <i class="fas fa-download"></i>
                        </a>
                    </x-backend.table.td>
                    <x-backend.table.td-actions
                        controlerName="sliders"
                        identificator="{{ $slider->id }}"
                        trashed="{{ $slider->trashed() }}"
                        trashedID="{{ $slider->id }}"
                    />

                </x-backend.table.tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
