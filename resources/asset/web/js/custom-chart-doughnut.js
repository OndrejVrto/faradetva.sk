function generateDoughnutGraph(id, labelGraph, dataGraph, dataColor, title, type) {

    const total = dataGraph.reduce((accumulator, currentValue) => accumulator + currentValue);
    const percent = dataGraph.map(value => Math.round((value / total) * 10000) / 100 + '%');

    const data = {
        labels: labelGraph.map(function(label, index) {
            return label + ' (' + percent[index] + ')';
        }),
        datasets: [
            {
                data: dataGraph,
                backgroundColor: dataColor,
            }
        ]
    };

    const config = {
        type: type,
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: false,
                    text: title
                },
            }
        }
    };

    new Chart(
        document.getElementById(id),
        config
    );
}
