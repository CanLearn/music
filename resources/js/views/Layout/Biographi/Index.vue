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

                                <div class="card-header card-header-primary">
                                    <router-link :to="{ name : 'biographi_create' }"
                                                 class="btn btn-outline-secondary btn-md float-left text-dark ">
                                        <li class="fa fa-file pl-2"></li>
                                        ساختن بیوگرافی
                                    </router-link>
                                    <h4 class="card-title "> لیست بیوگرافی ها  </h4>
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
                                                      نام و فامیل
                                                </th>

                                                <th>
                                                    موضوع
                                                </th>
                                                <th>
                                                    اسلاگ
                                                </th>
                                                <th>
                                                    تگ ها
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
                                            <tr v-for="(form  , index ) in forms.data" :key="form.id">
                                                <td>
                                                        {{ form.id  }}
                                                </td>
                                                <td>
                                                    {{ form.name_last_name }}
                                                </td>
                                                <td>
                                                    {{ form.title}}
                                                </td>
                                                <td>
                                                    {{ form.slug}}
                                                </td>
                                                <td>
                                                    {{ form.tags }}
                                                </td>
                                                <td>
                                                    {{ moment(form.created_at).format('jYYYY/jM/jD') }}
                                                </td>

                                                <td class="td-actions text-right">
                                                    <router-link
                                                        :to="{ name : 'biographi_edit' , params : { id : form.id }  }"
                                                        title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button @click="biogeraphiDelete(index , form.id )" title="حذف"
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
import axios from "axios";
import moment from "moment-jalaali";

export default {
    components: {SliderBar , NavBar},
    data() {
        return {
            forms : [],
            moment : moment

        }
    },
created() {
        this.getBiographi();
},
    methods: {
        getBiographi() {
            axios.get('http://127.0.0.1:8000/api/biographi')
                .then(({data}) => {
                    this.forms = data
                })
        } ,
        biogeraphiDelete(index , id ) {
            swal.confirm().then((result) => {
                if(result.value) {
                    axios.delete(`http://127.0.0.1:8000/api/biographi/${id}`)
                         .then(({data}) => {
                             this.getBiographi();
                            this.$router.splice(index , 1 );
                        })
                }
            })
        }
    },

}
</script>
<style scoped>

</style>
