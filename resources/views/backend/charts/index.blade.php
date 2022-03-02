@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.charts_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.charts_description') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('charts.index') }}
@stop

@section('content')
    <x-admin-table
        columns="8"
        controlerName="charts"
        createBtn="Pridať nový graf"
        paginator="{{ $charts->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            <x-admin-table.th-check-active/>
            <x-admin-table.th width="15%">Názov grafu</x-admin-table.th>
            <x-admin-table.th width="15%">Popis grafu</x-admin-table.th>
            <x-admin-table.th-actions colspan="1" class="text-center">Dáta</x-admin-table.th-actions>
            <x-admin-table.th width="1%" class="text-center">Počet hodnôt</x-admin-table.th>
            <x-admin-table.th-actions colspan="3"/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($charts as $chart)
            <tr>
                <x-admin-table.td-check-active check="{{ $chart->active }}"/>
                <x-admin-table.td class="text-wrap text-break text-bold">{{ $chart->title }}</x-admin-table.td>
                <x-admin-table.td class="text-wrap text-break">{{ $chart->description }}</x-admin-table.td>
                <x-admin-table.td class="text-center">
                    <a  href="{{ route('charts.data.index', $chart) }}"
                        class="btn btn-outline-warning btn-sm btn-flat"
                        title="Vložiť dáta do grafu: {{ $chart->title }}">
                        <i class="fas fa-chart-pie"></i>
                    </a>
                </x-admin-table.td>
                <x-admin-table.td class="text-center">{{ $chart->data_count }}</x-admin-table.td>
                <x-admin-table.td-actions
                    controlerName="charts"
                    identificator="{{ $chart->slug }}"
                />
            </tr>
            @endforeach
        </x-slot>

    </x-admin-table>
@endsection
