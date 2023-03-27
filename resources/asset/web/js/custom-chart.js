function generateGraph(id, labelGraph, dataGraph, title, color, type, desc, name_x_axis, name_y_axis, aspectRatio) {
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
            aspectRatio: aspectRatio,
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
