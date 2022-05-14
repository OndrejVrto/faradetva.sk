@extends('admin._layouts.app')

@section('title', __('backend-texts.banners.title'))
@section('meta_description', __('backend-texts.banners.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('banners.index') }}
@stop

@section('content')
    <x-admin.table
        columns="9"
        controlerName="banners"
        createBtn="Vytvoriť nový Baner"
        paginator="{{ $banners->onEachSide(1)->links() }}"
        >

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th width="30%" class="text-center">Obrázok</x-admin.table.th>
            <x-admin.table.th>Názov baneru</x-admin.table.th>
            <x-admin.table.th class="text-center">Počet využití</x-admin.table.th>
            <x-admin.table.th-actions />
        </x-slot>

        <x-slot:table_body>
            @foreach($banners as $banner)
            <tr>
                {{-- <x-admin.table.td>{{$banner->id}}</x-admin.table.td> --}}
                <x-admin.table.td class="text-center">
                    <img src="{{ $banner->getFirstMediaUrl($banner->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/360x90" }}"
                    class="img-fluid px-3"
                    alt="Banner: {{ $banner->title }}"/>
                </x-admin.table.td>
                <x-admin.table.td class="text-wrap text-break">{{ $banner->title }}</x-admin.table.td>
                <x-admin.table.td class="text-center">
                    @if( $banner->static_pages_count != 0 )
                        <span class="badge bg-orange px-2 py-1">{{ $banner->static_pages_count }}</span>
                    @endif
                </x-admin.table.td>
                <x-admin.table.td class="text-center">
                    <a  href="{{ url($banner->getFirstMediaUrl($banner->collectionName) ?: '#') }}"
                        class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                        title="Stiahnuť pôvodný obrázok"
                        download
                    >
                        <i class="fa-solid fa-download"></i>
                    </a>
                </x-admin.table.td>
                <x-admin.table.td-actions
                    controlerName="banners"
                    identificator="{{ $banner->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
