<template>
 <div class="col-md-9 w-100">
     <Bar
         id="my-chart-id"
         :options="chartOptions"
         :data="chartData"
     /> </div>
</template>

<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)


export default {
    name: "User",
    components : {Bar} ,
    props: {
        chartId: {
            type: String,

        },

    },
    data() {
        return {
            chartData: {
                labels: [ 'فرودین', 'اردیبهشت', 'خرداد' ,'تیر',   'مرداد',  'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
                datasets: [ { data: [40, 20, 12 , 12, 12, 12, 12, 12, 12, 12, 12, 12] } ]
            },
            chartOptions: {
                responsive: true
            }
        }
    },
}
</script>

<style scoped>

</style>
