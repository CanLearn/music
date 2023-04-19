<template>
    <div class="wrapper ">
        <slider-bar />

        <router-view :key="$route.fullPath"></router-view>

        <div class="main-panel">
            <nav-bar />
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa 	fa fa-play"></i>
                                    </div>
                                    <p class="card-category">تعداد اهنگ ها </p>
                                    <h3 class="card-title">49/50
                                        <small>GB</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa fa-file-archive-o"></i>
                                    </div>
                                    <p class="card-category">تعداد البوم ها</p>
                                    <h3 class="card-title">$34,245</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Last 24 Hours
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <p class="card-category">تعداد کاربران</p>
                                    <h3 class="card-title">{{ user }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Tracked from Github
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="	fa fa-cloud-download"></i>
                                    </div>
                                    <p class="card-category">تعداد دانلود ها </p>
                                    <h3 class="card-title">+245</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa fa-battery-0"></i>
                                    </div>
                                    <p class="card-category">حجم مصرفی هاست</p>
                                    <h3 class="card-title">49/50
                                        <small>GB</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="	fa fa-book"></i>
                                    </div>
                                    <p class="card-category">تعداد بیوگرافی</p>
                                    <h3 class="card-title">$34,245</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Last 24 Hours
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        <i class="	fa fa-folder-o"></i>
                                    </div>
                                    <p class="card-category">تعداد دسته بندی</p>
                                    <h3 class="card-title">{{ category }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Tracked from Github
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa fa-credit-card-alt"></i>
                                    </div>
                                    <p class="card-category">تعداد خرید اشتراک</p>
                                    <h3 class="card-title">+245</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Just Updated
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
export default {
    name: "App",
    components: {SliderBar  , NavBar},
    data() {
        return {
            user : [],
            category : [],

        }
    },
    created() {
        this.getUser();
        this.getCategory();
    },
    methods: {
        getUser() {
            axios.get('http://127.0.0.1:8000/api/chart_user')
                .then(({data}) => {
                    console.log(data)
                    this.user = data ;
                })
        },
        getCategory() {
            axios.get('http://127.0.0.1:8000/api/chart_category')
                .then(({data}) => {
                    console.log(data)
                    this.category = data ;
                })
        },
    },
}
</script>
<style scoped>

</style>
