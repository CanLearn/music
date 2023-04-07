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
                                    <router-link :to="{ name : 'membership' }"
                                                 class="btn btn-outline-secondary btn-md float-left text-dark ">
                                        <li class="fa fa-chevron-left pl-2"></li>
                                        بازگشت
                                    </router-link>
                                    <h4 class="card-title "> ویرایش اشتراک ویژه </h4>
                                    <h3 class="card-title ">{{ membership.type }} </h3>
                                </div>
                                <div class="card-body">
                                    <form @submit.prevent="updateMembership">
                                        <div class="row">
                                            <div class="col-md-12 pt-4">
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control"
                                                           name="name"
                                                           v-model="membership.name"
                                                           placeholder="نام پر کنید ">
                                                </div>
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control"
                                                           name="description"
                                                           v-model="membership.description"
                                                           placeholder="محتوا پر کنید ">
                                                </div>
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control"
                                                           name="price"
                                                           v-model="membership.price"
                                                           placeholder="قیمت  پر کنید ">
                                                </div>
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control"
                                                           name="price"
                                                           v-model="membership.priority"
                                                           placeholder="قیمت  پر کنید ">
                                                </div>
                                                <div class="form-group bmd-form-group ">
                                                    <label class="pr-4 ">سالانه</label>
                                                    <input type="checkbox" class=" pl-5  form-check-input"
                                                           name="is_yearly"
                                                           v-model="membership.is_yearly"
                                                    >
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-12 pt-3 pb-5">
                                            <button type="submit" class="btn btn-light-grey pull-right "> ارسال
                                            </button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
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

export default {
    name: "App",
    components: {SliderBar, NavBar, Bootstrap5Pagination},
    data() {
        return {
            membership : {
                name : '' ,
                description :''  ,
                price : '' ,
                priority : '' ,
                is_yearly : false
            }
        }
    },
    created() {
        this.getMembership();
    },
    methods: {
        updateMembership() {
            axios.patch(`http://127.0.0.1:8000/api/membership/${this.$route.params.id}` , this.membership)
                .then(({data}) => {
                    this.$router.push({ name: 'membership' })
                    swal.message();
                })
        } ,
       getMembership() {
            axios.get(`http://127.0.0.1:8000/api/membership/${this.$route.params.id}` )
                .then(({ data }) => {
                    this.membership = data

                })
        }
    },

}

</script>
<style scoped>

</style>
