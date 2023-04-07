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
                                    <router-link :to="{ name : 'category' }"
                                                 class="btn btn-outline-secondary btn-md float-left text-dark ">
                                        بازگشت
                                        <li class="fa fa-chevron-left  pl-2"></li>
                                    </router-link>
                                    <h4 class="card-title"> ویرایش دسته بندی  </h4>
                                    <p class="card-category ">{{ category.name }}</p>
                                </div>
                                <div class="card-body">
                                    <form @submit.prevent="updateCategory">
                                        <div class="row">
                                            <div class="col-md-12 pt-4">
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control" v-model="category.name" name="name"
                                                           placeholder="دسته بندی پر کنید ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pt-3 pb-5">
                                            <button type="submit" class="btn btn-light-grey pull-right "> ارسال دسته
                                            </button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                    <div class="table-responsive">

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

export default {
    name: "App",
    components: {SliderBar, NavBar} ,
    data() {
        return {
            category :{}
        }
    },
    created() {
        axios.get(`http://127.0.0.1:8000/api/category/${this.$route.params.id}`)
        .then(({data}) => {
            this.category = data
        })
    },
    methods: {
            updateCategory() {
                axios.put(`http://127.0.0.1:8000/api/category/${this.$route.params.id}` , this.category)
                    .then(({ data }) => {
                        this.$router.push({ name: 'category' })
                        swal.message();
                    })
            }
    },
}
</script>
<style scoped>

</style>
