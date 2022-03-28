@extends('backend._layouts.app')

@section('title', __('backend-texts.banners.title'))
@section('meta_description', __('backend-texts.banners.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('banners.index') }}
@stop

@section('content')
    <x-backend.table
        columns="9"
        controlerName="banners"
        createBtn="Vytvoriť nový Baner"
        paginator="{{ $banners->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th width="30%" class="text-center">Obrázok</x-backend.table.th>
            <x-backend.table.th>Názov baneru</x-backend.table.th>
            <x-backend.table.th class="text-center">Počet využití</x-backend.table.th>
            <x-backend.table.th-actions />
        </x-slot>

        <x-slot name="table_body">
            @foreach($banners as $banner)
            <tr>
                {{-- <x-backend.table.td>{{$banner->id}}</x-backend.table.td> --}}
                <x-backend.table.td class="text-center">
                    <img src="{{ $banner->getFirstMediaUrl($banner->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/360x90" }}"
                    class="img-fluid px-3"
                    alt="Banner: {{ $banner->title }}"/>
                </x-backend.table.td>
                <x-backend.table.td class="text-wrap text-break">{{ $banner->title }}</x-backend.table.td>
                <x-backend.table.td class="text-center">
                    @if( $banner->static_pages_count != 0 )
                        <span class="badge bg-orange px-2 py-1">{{ $banner->static_pages_count }}</span>
                    @endif
                </x-backend.table.td>
                <x-backend.table.td class="text-center">
                    <a  href="{{ url($banner->getFirstMediaUrl($banner->collectionName) ?: '#') }}"
                        class="btn btn-outline-warning btn-sm btn-flat"
                        title="Stiahnuť pôvodný obrázok"
                        download
                    >
                        <i class="fas fa-download"></i>
                    </a>
                </x-backend.table.td>
                <x-backend.table.td-actions
                    controlerName="banners"
                    identificator="{{ $banner->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
