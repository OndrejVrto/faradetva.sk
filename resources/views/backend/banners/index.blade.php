@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.banners_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.banners_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('banners.index') }}
@stop

@section('content')
    <x-admin-table
        columns="7"
        controlerName="banners"
        createBtn="Vytvoriť nový Baner"
        paginator="{{ $banners->onEachSide(1)->links() }}"
        >

        <x-slot name="createNote">
            Na stránke sa zobrazuje iba jeden náhodný baner pre každú stránku!
            <br>
            Pre fungovanie musí byť vložený aspoň jeden obrázok.
        </x-slot>

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th-check-active/>
            <x-admin-table.th width="30%" class="text-center">Obrázok</x-admin-table.th>
            <x-admin-table.th>Názov stránky</x-admin-table.th>
            <x-admin-table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($banners as $banner)
            <tr>
                {{-- <x-admin-table.td>{{$banner->id}}</x-admin-table.td> --}}
                <x-admin-table.td-check-active check="{{ $banner->active }}"/>
                <x-admin-table.td class="text-center">
                    <img src="{{ $banner->getFirstMediaUrl('banner', 'crop-thumb') ?: "http://via.placeholder.com/360x90" }}"
                    class="img-fluid px-3"
                    alt="Banner: {{ $banner->title }}"/>
                </x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{$banner->title}}</x-admin-table.td>
                <x-admin-table.td-actions
                    editLink="{{ route('banners.edit', $banner->id)}}"
                    deleteLink="{{ route('banners.destroy', $banner->id)}}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
