Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['1AM', '2AM', '3M', '6PM', '7PM', '8pm', '9PM', '10AM'],
        title: {
            text: 'Time Period(Daily)'
        }
    },
    yAxis: {
        title: {
            text: 'Number of Users'
        },
        lineColor: '#00000017',
        lineWidth: 1,
        min: 0,
        max: 800,
        tickInterval: 100
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: false
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: 'Tokyo',
        color: '#2599d2',
        data: [100.0, 200.9, 500.5, 460.5, 700.4, 200.5, 800.2, 260.5]
    }, {
        name: 'London',
        color: '#111',
        data: [100.9, 240.2, 800.7, 500.5, 180.9, 300.2, 700.0, 160.6]
    }]
});