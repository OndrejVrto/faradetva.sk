@pushOnce('js')
    <script @nonce src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpushOnce

@foreach ($graphs as $graph)
    
    <div class="heading_section pad_t_50 pad_b_50 text-church-template-blue">
        <h2>{{ $graph['title'] }}</h2>
        <canvas id="Chart-{{ $graph['id'] }}"></canvas>
    </div>

    @push('js')
        <script @nonce>
            const data{{ $graph['id'] }} = {
                labels: [
                    {{ $graph['labelGraph'] }}
                ],
                datasets: [{
                    label: '{{ $graph['title'] }}',
                    backgroundColor: '{{ $graph['color'] }}6c',
                    borderColor: '{{ $graph['color'] }}',
                    fill: 'start',
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    data: [
                        {{ $graph['dataGraph'] }}
                    ],
                }],
            };

            const config{{ $graph['id'] }} = {
                type: '{{ $graph['type'] }}',
                data: data{{ $graph['id'] }},
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: false,
                            text: '{{ $graph['title'] }}',
                        },
                        subtitle: {
                            display: true,
                            text: '{{ $graph['desription'] }}',
                            color: '#243A4F',
                            font: {
                                size: 16,
                            },
                            padding: {
                                bottom: 10
                            },
                        },
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: '{{ $graph['name_x_axis'] }}',
                                color: '#ff7b33',
                                font: {
                                    size: 20,
                                    weight: 'bold',
                                    lineHeight: 1.2,
                                },
                                padding: {top: 10, left: 0, right: 0, bottom: 0}
                            }
                        },
                        y: {
                            display: true,
                            min: 0,
                            title: {
                                display: true,
                                text: '{{ $graph['name_y_axis'] }}',
                                color: '#ff7b33',
                                font: {
                                    size: 20,
                                    weight: 'bold',
                                    lineHeight: 1.2,
                                },
                                padding: {top: 0, left: 0, right: 0, bottom: 10}
                            }
                        }
                    },
                }
            };

            const myChart{{ $graph['id'] }} = new Chart(
                document.getElementById('Chart-{{ $graph['id'] }}'),
                config{{ $graph['id'] }}
            );
        </script>
    @endpush

@endforeach
