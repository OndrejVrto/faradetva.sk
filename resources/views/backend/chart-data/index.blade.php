@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.charts-data_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.charts-data_description') )

@section('content_breadcrumb')
    {{-- TODO: BreadCrumbs for nested resources --}}
    {{-- {{ Breadcrumbs::render('charts.data.index') }} --}}
@stop

@section('content')
    <x-admin-table
        columns="6"
        controlerName="charts.data"
        createLink="{{ route('charts.data.create', $chart) }}"
        linkBack="{{ route('charts.index') }}"
        createBtn="Pridať nový údaj"
        paginator="{{ $data->onEachSide(1)->links() }}"
        headerSpecial="<span class='h4 mr-3'>Údaje pre graf:</span> {{ $chart->title }}"
        >

        <x-slot name="table_header">
            <x-admin-table.th width="15%">Parameter</x-admin-table.th>
            <x-admin-table.th width="15%">Hodnota</x-admin-table.th>
            <x-admin-table.th-actions />
        </x-slot>

        <x-slot name="table_body">
            @foreach($data as $keyValue)
                <tr>
                    <x-admin-table.td class="text-wrap text-break text-bold">{{$keyValue->key}}</x-admin-table.td>
                    <x-admin-table.td class="text-wrap text-break">{{$keyValue->value}}</x-admin-table.td>
                    <x-admin-table.td-actions
                        controlerName="charts.data"
                        editLink="{{ route('charts.data.edit', ['chart' => $chart->id, 'data' => $keyValue->id]) }}"
                        deleteLink="{{ route('charts.data.destroy', ['chart' => $chart->id, 'data' => $keyValue->id]) }}"
                    />
                </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
