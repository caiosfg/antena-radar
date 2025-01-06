<template>
    <div class="grid grid-cols-2 gap-4 w-full px-8">
        <div id="linechart"></div>
        <div id="barchart"></div>
    </div>
</template>

<script setup>
import ApexCharts from 'apexcharts'
import { useSatellite } from "../store/useSatellite"
import { onMounted, ref } from "vue";

const optionsLine = ref({
    series: [{
        name: 'Antenas',
        data: []
    }],
    chart: {
        type: 'line',
        height: 350
    },
    xaxis: {
        categories: []
    }
});

const optionsBar = ref(
    {
        series: [{
            data: []
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
            categories: []
        },
        yaxis: {
            labels: {
                show: false
            }
        },
        title: {
            text: 'Listagem de antenas',
            align: 'center',
            floating: true
        },
        subtitle: {
            text: 'Ranking das UFs',
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
    }
);

const store = useSatellite();

onMounted(async () => {

    var chartOriginLine = document.querySelector('#linechart');
    var chartOriginBar = document.querySelector('#barchart');

    await getAllRanking()

    if (chartOriginLine) {
        await createLineCharts()
    }

    if (chartOriginBar) {
        await createBarCharts()
    }
})

async function getAllRanking() {
    await store.fetchSatelliteRanking().then(response => {
        if (response.data) {
            response.data?.forEach((line) => {
                if (line.total) {
                    optionsLine.value.series[0].data?.push(line.total);
                    optionsBar.value.series[0].data?.push(line.total);
                }
                if (line.uf) {
                    optionsLine.value.xaxis.categories.push(line.uf);
                    optionsBar.value.xaxis.categories.push(line.uf);
                }
            });
        }
    });
}

function createLineCharts() {
    const chart = new ApexCharts(document.querySelector('#linechart'), optionsLine.value);
    chart.render();
}

function createBarCharts() {
    var chart = new ApexCharts(document.querySelector("#barchart"), optionsBar.value);
    chart.render();
}
</script>