function generateDoughnutGraph(id, labelGraph, dataGraph, dataColor, title, type) {

    const data = {
        labels: labelGraph,
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
                // title: {
                //     display: true,
                //     text: title
                // }
            }
        },
    };

    const chart = new Chart(
        document.getElementById(id),
        config
    );

    console.log(chart.id);
}
