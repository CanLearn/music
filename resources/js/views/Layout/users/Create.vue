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
                                    <h4 class="card-title">ساخت کاربر </h4>
                                    <!--                                    <p class="card-category ">Complete your profile</p>-->
                                </div>
                                <div class="card-body">
                                    <form  @submit.prevent="storeUser">
                                        <div class="row">
                                            <div class="col-md-12 pt-4">
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control" placeholder="نام" name="name" v-model="form.name">
                                                </div>
                                                <div class="form-group bmd-form-group ">
                                                    <input type="email" class="form-control" placeholder="ایمیل" name="email" v-model="form.email">
                                                </div>

                                                <div class="form-group bmd-form-group ">
                                                    <input type="password" class="form-control" placeholder="رمز" name="password" v-model="form.password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pt-3">
                                            <button type="submit" class="btn btn-light-grey pull-right"> ثبت نام </button>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-md-12 pt-3">
                                            <p class="alert alert-danger" v-if="error">{{ error }}</p>
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
    name: "App",
    components: {SliderBar , Content , NavBar} ,
    data(){
        return {
            form : {
                name: null,
                email: null,
                password: 'password',
            },
            error : '',
        }
    },
    methods : {
        storeUser() {
            axios.post('http://127.0.0.1:8000/api/users/' , this.form )
                .then(({data}) => {
                    this.$router.push({ name: 'user' });
                    swal.message();
                })
            .catch(({ response }) => {
                if (response.data.message)
                {
                    this.error = response.data.message[0].message[0].message
                }

            })
        }
    }
}
</script>

<style scoped>

</style>
