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
                                    <router-link :to="{ name : 'user' }"
                                                 class="btn btn-outline-secondary btn-md float-left text-dark ">
                                        <li class="	fa fa-exchange pl-2"></li>
                                        برگشت
                                    </router-link>
                                    <h4 class="card-title">ویرایش کاربران      <span class="p-4"> {{  formName.name  }}</span></h4>
                                    <!--                                    <p class="card-category ">Complete your profile</p>-->
                                </div>
                                <div class="card-body">
                                    <form  @submit.prevent="updateUser">
                                        <div class="row">
                                            <div class="col-md-12 pt-4">
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control" placeholder="نام" name="name" v-model="formName.name">
                                                </div>
                                                <div class="form-group bmd-form-group ">
                                                    <input type="email" class="form-control" placeholder="ایمیل" name="email" v-model="formName.email">
                                                </div>

                                                <div class="form-group bmd-form-group ">
                                                    <input type="password" class="form-control" placeholder="رمز" name="password" v-model="formName.password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pt-3">
                                            <button type="submit" class="btn btn-light-grey pull-right"> ثبت نام </button>
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
import Content from "../../../components/Panel/content.vue";
import NavBar from "../../../components/Panel/NavBar.vue";
import axios from "axios";
export default {
    name: "Edit",
    components: {SliderBar , Content , NavBar} ,
    data(){
        return {
            error : '',
            formName : []

        }

    },
    created() {
        axios.get(`http://127.0.0.1:8000/api/users/${this.$route.params.id}`)
        .then(({ data }) => {
            this.formName = data
        })
    },
    methods :
        {
            updateUser(){
                axios.patch(`http://127.0.0.1:8000/api/users/${this.$route.params.id}` , this.formName)
                .then((data) => {
                    this.$router.push({ name: 'user' })
                    swal.message();
                })
            }
        }
}
</script>

<style scoped>

</style>
