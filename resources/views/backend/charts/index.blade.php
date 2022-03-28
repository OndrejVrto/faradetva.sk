@extends('backend._layouts.app')

@section('title', __('backend-texts.charts.title'))
@section('meta_description', __('backend-texts.charts.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('charts.index') }}
@stop

@section('content')
    <x-backend.table
        columns="8"
        controlerName="charts"
        createBtn="Pridať nový graf"
        paginator="{{ $charts->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            <x-backend.table.th-check-active/>
            <x-backend.table.th width="15%">Názov grafu</x-backend.table.th>
            <x-backend.table.th width="15%">Popis grafu</x-backend.table.th>
            <x-backend.table.th-actions colspan="1" class="text-center">Dáta</x-backend.table.th-actions>
            <x-backend.table.th width="1%" class="text-center">Počet hodnôt</x-backend.table.th>
            <x-backend.table.th-actions />
        </x-slot>

        <x-slot name="table_body">
            @foreach($charts as $chart)
                <x-backend.table.tr trashed="{{ $chart->trashed() }}">

                    <x-backend.table.td-check-active check="{{ $chart->active }}"/>
                    <x-backend.table.td class="text-wrap text-break text-bold">{{ $chart->title }}</x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break">{{ $chart->description }}</x-backend.table.td>
                    <x-backend.table.td class="text-center">
                        @if (! $chart->trashed())
                            @can('charts.data.index')
                                <a  href="{{ route('charts.data.index', $chart) }}"
                                    class="btn btn-outline-warning btn-sm btn-flat"
                                    title="Vložiť dáta do grafu: {{ $chart->title }}">
                                    <i class="fas fa-chart-pie"></i>
                                </a>
                            @endcan
                        @endif
                    </x-backend.table.td>
                    <x-backend.table.td class="text-center">{{ $chart->data_count }}</x-backend.table.td>
                    <x-backend.table.td-actions
                        controlerName="charts"
                        identificator="{{ $chart->slug }}"
                        trashed="{{ $chart->trashed() }}"
                        trashedID="{{ $chart->id }}"
                    />

                </x-backend.table.tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
