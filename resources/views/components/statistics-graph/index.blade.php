<canvas id="Chart-{{ $graph['id'] }}"></canvas>

{{-- <pre>
    @dump($graph)
</pre> --}}

@once
    @push('js')
        <script @nonce src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush
@endonce

@push('js')
    <script @nonce>
        const data{{ $graph['id'] }} = {
            labels: [
                {{ $graph['labelGraph'] }}
            ],
            datasets: [{
                label: '{{ $graph['title'] }}',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    {{ $graph['dataGraph'] }}
                ],
            }]
        };

        const config{{ $graph['id'] }} = {
            type: 'line',
            data: data{{ $graph['id'] }},
            options: {}
        };

        const myChart{{ $graph['id'] }} = new Chart(
            document.getElementById('Chart-{{ $graph['id'] }}'),
            config{{ $graph['id'] }}
        );
    </script>
@endpush
