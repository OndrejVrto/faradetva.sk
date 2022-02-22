@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.sliders_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.sliders_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('sliders.index') }}
@stop

@section('content')
    <x-admin-table
        columns="7"
        controlerName="sliders"
        createBtn="Pridať nový obrázok s myšlienkou"
        createLink="{{ route('sliders.create') }}"
        paginator="{{ $sliders->onEachSide(1)->links() }}"
        >

        <x-slot name="createNote">
            Na stránke sa zobrazujú iba tri náhodné obrázky!
            <br>
            Pre fungovanie musia byť vložené minimálne dve.
        </x-slot>

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th-check-active/>
            <x-admin-table.th width="10%" class="text-center">Obrázok</x-admin-table.th>
            <x-admin-table.th width="25%">Myšlienka</x-admin-table.th>
            <x-admin-table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($sliders as $slider)
            <tr>
                {{-- <x-admin-table.td>{{$slider->id}}</x-admin-table.td> --}}
                <x-admin-table.td-check-active check="{{ $slider->active }}"/>
                <x-admin-table.td class="text-center">
                    <img src="{{ $slider->getFirstMediaUrl($slider->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/240x100" }}"
                    class="img-fluid"
                    alt="Obrázok: {{ $slider->full_heading }}"/>
                </x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{$slider->teaser}}</x-admin-table.td>
                <x-admin-table.td-actions
                    controlerName="sliders"
                    identificator="{{ $slider->id }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
