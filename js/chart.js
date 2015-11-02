$(function () {
    $('#container').highcharts({
        title: {
            text: 'Количество ресторанов в Нижнем Новгороде',
            x: 0 //center
        },
        subtitle: {
            text: 'с самого начала проведения ресторанного дня',
            x: -20
        },
        xAxis: {
            categories: ['17.11.12', '17.02.13', '18.05.13', '18.08.13', '16.11.13', '16.02.14',
                '17.05.14', '17.08.14', '15.11.14', '15.02.15', '16.05.15', '16.08.15']
        },
        yAxis: {
            title: {
                text: 'Количество ресторанов'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' рест.'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Н.Новгород',
            data: [4, 12, 15, 28, 23, 30, 43, 45, 37, 54, 82, 69]
        }]
    });
});