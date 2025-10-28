document.addEventListener('DOMContentLoaded', function () {
    const labels = window.chartData.labels;
    const freePage = window.chartData.freeCopy;
    const paidPage = window.chartData.paidCopy;

    const data = {
        labels: labels,
        datasets: [
            {
                label: 'Ösztöndíjas (ingyen)',
                data: freePage,
                backgroundColor: '#37373f',
            },
            {
                label: 'Nem ösztöndíjas / fizetős',
                data: paidPage,
                backgroundColor: '#ce1212',
            }
        ]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Másolt oldalak karonként' }
            },
            scales: {
                x: { stacked: true },
                y: { stacked: true, beginAtZero: true, title: { display: true, text: 'Oldalak száma' } }
            }
        }
    };

    new Chart(document.getElementById('copyChart'), config);
});
