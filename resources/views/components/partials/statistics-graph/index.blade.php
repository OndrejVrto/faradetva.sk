@pushOnce('js')
    <script @nonce src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        function generateGraph(id, labelGraph, dataGraph, title, color, type, desc, name_x_axis, name_y_axis) {
            const data = {
                labels: labelGraph,
                datasets: [{
                    label: title,
                    backgroundColor: color + '6c',
                    borderColor: color,
                    fill: 'start',
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    data: dataGraph,
                }],
            };

            const config = {
                type,
                data,
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: false,
                            text: title,
                        },
                        subtitle: {
                            display: true,
                            text: desc,
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
                                text: name_x_axis,
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
                                text: name_y_axis,
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

            const chart = new Chart(
                document.getElementById(id),
                config
            );
        }
    </script>
@endpushOnce

@foreach ($graphs as $graph)
    
    <div class="heading_section pad_t_50 pad_b_50 text-church-template-blue">
        <h2>{{ $graph['title'] }}</h2>
        <canvas id="Chart-{{ $graph['id'] }}"></canvas>
    </div>

    @push('js')
        <script @nonce>
            generateGraph(
                'Chart-{{ $graph['id'] }}',
                [{{ $graph['labelGraph'] }}],
                [{{ $graph['dataGraph'] }}],
                '{{ $graph['title'] }}',
                '{{ $graph['color'] }}',
                '{{ $graph['type'] }}',
                '{{ $graph['desription'] }}',
                '{{ $graph['name_x_axis'] }}',
                '{{ $graph['name_y_axis'] }}'
            );
        </script>
    @endpush

@endforeach
