@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.galleries_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.galleries_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('galleries.index') }}
@stop

@section('content')
    <x-admin-table
        columns="11"
        controlerName="galleries"
        createBtn="Pridať novú galériu"
        paginator="{{ $galleries->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
            <x-admin-table.th>Pracovný názov galérie</x-admin-table.th>
            <x-admin-table.th-actions colspan="3"/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($galleries as $gallery)
            <tr>
                {{-- <x-admin-table.td>{{$gallery->id}}</x-admin-table.td> --}}
                <x-admin-table.td class="text-wrap text-break text-bold">{{ $gallery->slug }}</x-admin-table.td>
                <x-admin-table.td-actions
                    controlerName="galleries"
                    identificator="{{ $gallery->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
