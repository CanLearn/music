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
                                            <tr v-for="(file , index) in files.data" :key="file.id">
                                                <td>
                                                    {{ file.id }}
                                                </td>
                                                <td>
                                                    {{ file.name_music_english }}
                                                </td>
                                                <td>
                                                    {{ file.name_english }}
                                                </td>
                                                <td>
                                                    {{ moment(file.created_at).format('jYYYY/jM/jD') }}

                                                </td>
                                                <td>
                                                    {{ file.slug }}
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-info-color-dark dropdown-toggle"
                                                                type="button" id="dropdownMenu3" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                            ورژن
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a :href="`/manager/download/file/${file.file_320 }`" @click="download_320" class="dropdown-item" type="button">320</a>
                                                            <button @click="download_128" class="dropdown-item" type="button">128</button>
                                                            <button @click="download_wav" class="dropdown-item" type="button">wav</button>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="td-actions text-right">
                                                    <router-link
                                                        :to="{ name : 'file_edit' , params : { id : file.id }  }"
                                                        title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button @click="deleteFile( file.id , index )" title="حذف"
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
import moment from "moment-jalaali";


export default {
    name: "App",
    components: {SliderBar, NavBar, Vue3TagsInput},
    data() {
        return {
            tags: [],
            items: [],
            moment: moment,
            files: []

        }
    },

    created() {
        this.getFile();
    },
    methods: {
        getFile() {
            axios.get('http://127.0.0.1:8000/api/files')
                .then(({data}) => {
                    this.files = data
                })
        } ,
        deleteFile(id , index)
        {
            axios.delete(`http://127.0.0.1:8000/api/files/${id}`)
             .then((data) => {
                 this.getFile();
             })
        },
        // download_320()
        // {
        //     axios.get('')
        // }
    },

}
</script>
<style scoped>

</style>
