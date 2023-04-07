<template>
    <div class="wrapper ">
        <slider-bar/>

        <router-view :key="$route.fullPath"></router-view>

        <div class="main-panel">
            <nav-bar/>
            <br>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <router-link :to="{ name : 'file_create' }"
                                                 class="btn btn-outline-secondary btn-md float-left text-dark ">
                                        <li class="fa fa-file pl-2"></li>
                                        ساختن کاربر
                                    </router-link>
                                    <h4 class="card-title">فایل </h4>
                                    <p class="card-category ">انتخاب اهنگ یا البوم </p>
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
                                                    نام اهنک
                                                </th>

                                                <th>
                                                    نام خواننده
                                                </th>
                                                <th>
                                                    تاریخ ساخت
                                                </th>
                                                <th>
                                                    slug
                                                </th>
                                                <th>
                                                   دانلود
                                                </th>
                                                <th>
                                                    عملیات
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr >
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-info-color-dark dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                           ورژن
                                                        </button>
                                                        <div class="dropdown-menu" >
                                                            <button class="dropdown-item" type="button">320</button>
                                                            <button class="dropdown-item" type="button">128</button>
                                                            <button class="dropdown-item" type="button">wav</button>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="td-actions text-right">
                                                    <router-link
                                                        :to="{  }"
                                                        title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button  title="حذف"
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
import axios from 'axios'
import SliderBar from "../../../components/Panel/sliderBar.vue";
import NavBar from "../../../components/Panel/NavBar.vue";
import Vue3TagsInput from 'vue3-tags-input';


export default {
    name: "App",
    components: {SliderBar, NavBar , Vue3TagsInput} ,
    data() {
        return {
            tags: [] ,
            items: [] ,
        }
    },

 created() {
    axios.get('https://jsonplaceholder.typicode.com/posts')
        .then(response => {
            console.log(response.data)
        })

 },
}
</script>
<style scoped>

</style>
