<template>
    <div class="col-md-9 w-100">
        <Line
            :options="chartOptions"
            :data="data"
        /> </div>
</template>

<script>
import { Line } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'



export default {
    name: "Music",

    data() {
        return {

        }
    },

}
</script>

<style scoped>

</style>
