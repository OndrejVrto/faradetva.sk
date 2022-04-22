@foreach ($graphs as $graph)

    <div class="heading_section pad_t_50 pad_b_50 text-church-template-blue">
        <h2>{{ $graph['title'] }}</h2>
        <canvas id="Chart-{{ $graph['id'] }}"></canvas>
    </div>

    @php
        $scripts[] = sprintf(
            "generateGraph('Chart-%s', [%s], [%s], '%s', '%s', '%s', '%s', '%s', '%s');",
            $graph['id'],
            $graph['labelGraph'],
            $graph['dataGraph'],
            $graph['title'],
            $graph['color'],
            $graph['type'],
            $graph['desription'],
            $graph['name_x_axis'],
            $graph['name_y_axis']
        );
    @endphp

@endforeach

@pushOnce('js')
    <!-- CHART script Start -->
    <script @nonce type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/custom-chart.js') }}"></script>
@endpushOnce

@push('js')
    <script @nonce>
        {!! implode(PHP_EOL."\t", $scripts ?? null) !!}
    </script>
    <!-- CHART script End -->
@endpush
