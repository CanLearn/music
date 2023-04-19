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
                                    <router-link :to="{ name : 'category_create' }"
                                                 class="btn btn-outline-secondary btn-md float-left text-dark ">
                                        <li class="	fa fa-clipboard pl-2"></li>
                                        ساختن دسته بندی
                                    </router-link>
                                    <h4 class="card-title">دسته بندی </h4>

                                    <!--                                    <p class="card-category ">Complete your profile</p>-->
                                </div>
                                <div class="card-body">
                                    <div class="col-md-10 d-flex justify-content-around">
                                        <form @submit.prevent="search" >
                                            <input  type="text"  class="pl-2" v-model="INsearch" name="search">
                                            <button class="search_button"> <i class="fa fa-search"></i> </button>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    نام دسته بندی
                                                </th>
                                                <th>
                                                    نام slug
                                                </th>
                                                <th>
                                                    تاریخ ساخت
                                                </th>
                                                <th>
                                                    عملیات
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr v-for="(category , index) in categorys.data" :key="category.id">
                                                <td>
                                                        {{ category.id }}
                                                </td>
                                                <td>
                                                    {{ category.name }}
                                                </td>
                                                <td>
                                                    {{ category.slug }}
                                                </td>
                                                <td>
                                                    {{ moment(category.created_at).format('jYYYY/jM/jD') }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <router-link
                                                        :to="{ name : 'category_edit' , params : {id : category.id}  }"
                                                        title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button title="حذف"
                                                            @click="categoryDelete( category.id , index )"
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
    name: "App",
    components: {SliderBar, NavBar} ,
    data() {
        return {
            categorys : [] ,
            moment : moment ,
            INsearch : []
        }
    },
   created() {
      this.getCategory() ;
   } ,

    methods: {
        getCategory (){
            axios.get('http://127.0.0.1:8000/api/category' )
                .then(({ data }) => {
                    this.categorys = data
                })
        },
        categoryDelete ( id , index ) {
           swal.confirm().then((result) => {
               if(result.value) {
                   axios.delete(`http://127.0.0.1:8000/api/category/${id}`)
                       .then(({data}) => {
                           this.getCategory();
                       })
               }
           })
        } ,
        search()
        {
            axios.post('http://127.0.0.1:8000/api/category')
            .then((data) => {
               console.log(data.data)
        })
        }
    },


}
</script>
<style scoped>
search_button{
    background-color: #23272b;
    padding : 0 ;
    margin: 0;
    width: 10px;
    height : 11px;
    border-radius: 12px;
}
</style>
