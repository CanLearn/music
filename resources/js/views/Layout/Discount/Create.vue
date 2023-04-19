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
                                <div class="card_header card-header-primary">
                                    ایجاد کد تخفیف
                                    <router-link :to="{ name : 'discount' }" class="float-left btn btn-outline-secondary">
                                        بازگشت
                                        <i class="fa fa-mail-reply"></i>
                                    </router-link>
                                </div>
                                <div class="card-body">
                                    <form @submit.prevent="discount">
                                        <div class="row">
                                            <div class="col-md-12 pt-4">
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control" v-model="form.title"
                                                           name="title"
                                                           placeholder="موضوع تخفیف پر کنید ">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-4">
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control" v-model="form.name"
                                                           name="name"
                                                           placeholder="نام تخفیف پر کنید ">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-4">
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control" v-model="form.code"
                                                           name="code"
                                                           placeholder="کد تخفیف پر کنید">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-4">
                                                <div class="form-group bmd-form-group ">
                                                    <input type="text" class="form-control" v-model="form.percent"
                                                           name="percent"
                                                           placeholder="درصد تخفیف پر کنید ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pt-3 pb-5">
                                            <button type="submit" class="btn btn-light-grey pull-right "> ارسال
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
import moment from "moment-jalaali";

export default {
    name: "App",
    components: {SliderBar  , NavBar },
    data() {
        return {
            moment : moment ,
            form : {
                title : '',
                name : '',
                code : '',
                percent : '',
            }
        }
    },
    methods: {
        discount() {
            axios.post('http://127.0.0.1:8000/api/discount' , this.form)
            .then(({data}) => {
                console.log(data)
                this.$router.push({ name : 'discount' })
            })
        }
    },
}

</script>
