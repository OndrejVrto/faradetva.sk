@foreach ($graphs as $graph)

    <div class="pad_b_50 text-center">
        <h2 class="text-church-template-blue">{{ $graph['title'] }}</h2>
        <canvas id="Chart-{{ $graph['id'] }}"></canvas>
        <div class="ms-5 me-2 mt-4">
            <p class="fw-bolder"><em>{{ $teaser }}</em></p>
            <p>{{ $after }}</p>
        </div>
    </div>

    @php
        if ( $graph['chartType'] === \App\Enums\ChartType::DOUGHNUT ) {
            $scripts[] = sprintf(
                "generateDoughnutGraph('Chart-%s', [%s], [%s], [%s], '%s', '%s');",
                $graph['id'],
                $graph['labelGraph'],
                $graph['dataGraph'],
                $graph['dataColor'],
                $graph['title'],
                $graph['type'],
            );
        } else {
            $scripts[] = sprintf(
                "generateGraph('Chart-%s', [%s], [%s], '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
                $graph['id'],
                $graph['labelGraph'],
                $graph['dataGraph'],
                $graph['title'],
                $graph['color'],
                $graph['type'],
                $graph['desription'],
                $graph['name_x_axis'],
                $graph['name_y_axis'],
                $aspectRatio,
            );
        }
    @endphp
@endforeach

@pushOnce('js')
    <!-- CHART script Start -->
    <script @nonce type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/app-chart.js'), true) }}"></script>
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/app-chart-doughnut.js'), true) }}"></script>
@endpushOnce

@push('js')
    <script @nonce>
        {!! implode(PHP_EOL."\t", $scripts ?? null) !!}
    </script>
    <!-- CHART script End -->
@endpush
