@extends('admin._layouts.app')

@section('title', __('backend-texts.sliders.title'))
@section('meta_description', __('backend-texts.sliders.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('sliders.index') }}
@stop

@section('content')
    <x-admin.table
        columns="9"
        controlerName="sliders"
        createBtn="Pridať nový obrázok s myšlienkou"
        createLink="{{ route('sliders.create') }}"
        paginator="{{ $sliders->onEachSide(1)->links() }}"
        >

        <x-slot:createNote>
            Na stránke sa zobrazujú tri náhodné myšlienky!
            <br>
            Pre fungovanie posúvača musia byť vložené minimálne dve.
        </x-slot>

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th-check-active/>
            <x-admin.table.th width="10%" class="text-center">Obrázok</x-admin.table.th>
            <x-admin.table.th width="25%">Myšlienka</x-admin.table.th>
            <x-admin.table.th-actions/>
        </x-slot>

        <x-slot:table_body>
            @foreach($sliders as $slider)
                <x-admin.table.tr trashed="{{ $slider->trashed() }}">

                    {{-- <x-admin.table.td>{{$slider->id}}</x-admin.table.td> --}}
                    <x-admin.table.td-check-active check="{{ $slider->active }}" check_false_title="Slider je zakázaný"/>
                    <x-admin.table.td class="text-center">
                        <img src="{{ $slider->getFirstMediaUrl($slider->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/240x100" }}"
                        class="img-fluid"
                        alt="Obrázok: {{ $slider->full_heading }}"/>
                    </x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">
                        {{ $slider->heading_1 }}
                        <br>
                        {{ $slider->heading_2 }}
                        <br>
                        {{ $slider->heading_3 }}
                    </x-admin.table.td>
                    <x-admin.table.td class="text-center">
                        <a  href="{{ url($slider->getFirstMediaUrl($slider->collectionName) ?: '#') }}"
                            class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                            title="Stiahnuť pôvodný obrázok"
                            download
                        >
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="sliders"
                        identificator="{{ $slider->id }}"
                        trashed="{{ $slider->trashed() }}"
                        trashedID="{{ $slider->id }}"
                    />

                </x-admin.table.tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
