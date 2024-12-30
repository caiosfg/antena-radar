<template>
    <div class="grid grid-cols-2 gap-4 w-full px-8">
        <div id="linechart"></div>
        <div id="barchart"></div>
    </div>
</template>

<script setup>
import ApexCharts from 'apexcharts'
import { onMounted, ref } from "vue";


const options = ref({});

onMounted(async () => {
    options.value = {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'sales',
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
        }],
        xaxis: {
            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
        }
    }

    var chartOriginLine = document.querySelector('#linechart');
    if (chartOriginLine) {
        createLineCharts()
    }

    var chartOriginBar = document.querySelector('#barchart');
    if (chartOriginBar) {
        createBarCharts()
    }

})

function createLineCharts() {
    const chart = new ApexCharts(document.querySelector('#linechart'), {
        series: [{
            name: 'Series 1',
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
        }],
        chart: {
            type: 'line',
            height: 350
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
        }
    });
    chart.render();
}

function createBarCharts() {
    var options = {
        series: [{
            data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
        chart: {
            type: 'bar',
            height: 380
        },
        plotOptions: {
            bar: {
                barHeight: '100%',
                distributed: true,
                horizontal: true,
                dataLabels: {
                    position: 'bottom'
                },
            }
        },
        colors: ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', '#f9a3a4', '#90ee7e',
            '#f48024', '#69d2e7'
        ],
        dataLabels: {
            enabled: true,
            textAnchor: 'start',
            style: {
                colors: ['#fff']
            },
            formatter: function (val, opt) {
                return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
            },
            offsetX: 0,
            dropShadow: {
                enabled: true
            }
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        xaxis: {
            categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
                'United States', 'China', 'India'
            ],
        },
        yaxis: {
            labels: {
                show: false
            }
        },
        title: {
            text: 'Custom DataLabels',
            align: 'center',
            floating: true
        },
        subtitle: {
            text: 'Category Names as DataLabels inside bars',
            align: 'center',
        },
        tooltip: {
            theme: 'dark',
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function () {
                        return ''
                    }
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#barchart"), options);
    chart.render();
}
</script>