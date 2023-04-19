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
                                    <router-link :to="{ name : 'user_create' }"
                                                 class="btn btn-outline-secondary btn-md float-left text-dark ">
                                        <li class="fa fa-user pl-2"></li>
                                        ساختن کاربر
                                    </router-link>
                                    <h4 class="card-title "> لیست کاربران </h4>
                                    <p class="card-category"> کسایی در سایت ثبت نام کردن </p>
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
                                                    تاریخ ورود
                                                </th>
                                                <th>
                                                    عملیات
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr v-for="(user, index) in users.data" :key="user.id">
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
                                                    {{ moment(user.created_at).format('jYYYY/jM/jD') }}
                                                </td>

                                                <td class="td-actions text-right">
                                                    <router-link
                                                        :to="{  name : 'user_edit' , params: {   id: user.id }  }"
                                                        title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button @click="deleteUser(user.id , index)" title="حذف"
                                                            class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
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
import SliderBar from "../../../components/Panel/sliderBar.vue";
import NavBar from "../../../components/Panel/NavBar.vue";
import {  Bootstrap5Pagination } from 'laravel-vue-pagination';
import moment from 'moment-jalaali';
export default {
    name: "App",

    components: {SliderBar, NavBar , Bootstrap5Pagination},
    data() {
        return {
            users: [],
            moment : moment
        }

    },
    created() {
        this.getUsers();

    },
    methods:
        {
            getUsers() {
                axios.get('http://127.0.0.1:8000/api/users')
                    .then(({data}) => {
                        this.users = data;
                    })
            },

            deleteUser(id, index) {
                swal.confirm().then((result) => {
                    if (result.value) {
                        axios.delete(`http://127.0.0.1:8000/api/users/${id}`)
                            .then( data => {
                                this.getUsers();
                                this.$router.splice(index , 1 );
                            })
                    }
                })
            }

        }
}
</script>

<style scoped>

</style>
