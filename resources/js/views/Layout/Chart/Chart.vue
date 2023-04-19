<template>
    <div class="wrapper ">
        <slider-bar />

        <router-view :key="$route.fullPath"></router-view>

        <div class="main-panel">
            <nav-bar />
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                       <ChartUser>
                       </ChartUser>
                        <br>
                        <ChartMusic>
                        </ChartMusic>
                        <br>
                        <br>
                        <ChartCountMusic>
                        </ChartCountMusic>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SliderBar from "../../../components/Panel/sliderBar.vue";
import NavBar from "../../../components/Panel/NavBar.vue";
import ChartUser from "../../../components/Panel/Chart/ChartUser.vue";
import ChartMusic from "../../../components/Panel/Chart/ChartMusic.vue";
import ChartCountMusic from "../../../components/Panel/Chart/ChartCountMusic.vue";

export default {
    name: "App",
    components: {SliderBar  , NavBar , ChartUser  , ChartMusic , ChartCountMusic},
    data() {
        return {
            user : [],
            category : [],
        }
    },
created() {
        this.getUser();
        this.getCategory();
},
    methods: {
        getUser() {
            axios.get('http://127.0.0.1:8000/api/chart_user')
                .then(({data}) => {
                    console.log(data)
                    this.user = data ;
                })
        },
        getCategory() {
            axios.get('http://127.0.0.1:8000/api/chart_category')
                .then(({data}) => {
                    console.log(data)
                    this.category = data ;
                })
        },
    },
}
</script>
<style scoped>

</style>
