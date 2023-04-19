<template>
    <div class="wrapper ">
        <slider-bar />

        <router-view :key="$route.fullPath"></router-view>

        <div class="main-panel">
            <nav-bar />
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                     <div class="col-md-12">
                         <div class="card">
                             <div class="card_header card-header-primary">
                                 salaam
                             </div>
                             <div class="card-body">

                             </div>
                         </div>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SliderBar from "../../../components/Panel/sliderBar.vue";
import NavBar from "../../../components/Panel/NavBar.vue";
import moment from "moment-jalaali";

export default {
    name: "App",
    components: {SliderBar  , NavBar },
    data() {
        return {
            moment : moment
            }
    },
}

</script>
