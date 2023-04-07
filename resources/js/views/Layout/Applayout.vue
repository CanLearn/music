<template>
    <div class="wrapper ">
        <slider-bar />

        <router-view :key="$route.fullPath"></router-view>

        <div class="main-panel">
            <nav-bar />

        </div>
    </div>
</template>

<script>
import SliderBar from "../../components/Panel/sliderBar.vue";
import Content from "../../components/Panel/content.vue";
import NavBar from "../../components/Panel/NavBar.vue";
export default {
    name: "App",
    components: {SliderBar , Content , NavBar}
}
</script>

<style scoped>

</style>
