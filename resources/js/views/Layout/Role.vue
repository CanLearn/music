<template>
    <div class="wrapper ">
        <slider-bar/>

        <router-view :key="$route.fullPath"></router-view>

        <div class="main-panel">
            <nav-bar/>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-header card-header-primary">
                                    <h4 class="card-title "> لیست نقش کاربران </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    نام
                                                </th>

                                                <th>
                                                    ایمیل
                                                </th>
                                                <th>
                                                    نقش
                                                </th>
                                                <th>
                                                    تاریخ
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr v-for="user in users.data" :key="user.id">
                                                <td>
{{ user.id }}
                                                </td>
                                                <td>
                                                    {{ user.name }}
                                                </td>
                                                <td>
                                                    {{ user.email }}
                                                </td>
                                                <td>
                                                    {{ user.role }}
                                                </td>
                                                <td>
                                                    {{ moment(user.created_at).format('jYYYY/jM/jD') }}

                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!--                                        <pagination :data="users" @pagination-change-page="getUsers"></pagination>-->
                                    </div>
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
import SliderBar from "../../components/Panel/sliderBar.vue";
import NavBar from "../../components/Panel/NavBar.vue";
import moment from "moment-jalaali";
export default {
    name: "App",
    components: {SliderBar  , NavBar} ,
    data() {
        return {
            moment : moment,
            users :  [] ,
        }
    },
    created() {
        this.getUsers() ;

    },
    methods: {
        getUsers() {
            axios.get('http://127.0.0.1:8000/api/users')
            .then(({data}) => {
                this.users = data
            })

        }
    },
}
</script>

<style scoped>

</style>
