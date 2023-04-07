<template>
    <component :is="componentName"></component>
</template>

<script>
import Login from './Login.vue'
import Register from './Register.vue'
import Home from '../Home.vue'


export default {
    name: "AuthRouter" ,

    components: [
        Login,
        Register,
        Home
    ],
    props: ['url'],


    computed: {
        componentName() {
            return ['login', 'register'].includes(this.url) ? this.url : 'home'
        }
    }
}
</script>

<style scoped>

</style>
