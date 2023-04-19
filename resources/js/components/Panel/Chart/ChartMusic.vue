<template>
    <div class="col-md-9 w-100">
        <div class="row">
            <Line
                :options="chartOptions"
                :data="data"
            />
        </div>
    </div>
</template>

<script>
import { Line } from 'vue-chartjs'
export default {
    name: "Music",

    data() {
        return {
             data : {
                 type: 'line',
                 labels:  [1 ,3 ,4,5, 6, 6, 7, 7, 8, 7] ,
                 datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }] ,
                 chartOptions: {
                     responsive: true
                 }
            },
        }
    },

}
</script>

<style scoped>

</style>
