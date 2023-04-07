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
                                    <h4 class="card-title">فایل </h4>
                                    <p class="card-category ">انتخاب اهنگ یا البوم </p>
                                </div>
                                <div class="card-body">
                                    <form @click.prevent="storeFile"  enctype="multipart/form-data" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group pt-4" >
                                                    <input type="text" class="form-control" placeholder="نام خواننده ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group pt-4">
                                                    <input type="text" class="form-control" placeholder="نام خواننده انگلیسی ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text" class="form-control" placeholder="نام اهنگ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text" class="form-control" placeholder="نام اهنگ انگلیسی">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-3"> انتخاب عکس اهنگ </span>
                                                    <input type="file" class="form-control bg-mdb-color btn btn-secondary" >
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-3"> انتخاب البوم </span>
                                                    <input type="file" class="form-control bg-mdb-color btn btn-secondary" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-1"> انتخاب کیفیت 320 </span>
                                                    <input type="file" class="form-control bg-mdb-color btn btn-secondary" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-1"> انتخاب کیفیت 120 </span>
                                                    <input type="file"  class="form-control bg-mdb-color btn btn-secondary" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-1"> انتخاب کیفیت wav </span>
                                                    <input type="file"  class="form-control bg-mdb-color btn btn-secondary" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group bmd-form-group">
                                                    <select class="form-select form-select-lg col-md-12  mb-3 mt-3">
                                                        <option value="volvo" class="form-control  form-select-lg mb-5">
                                                            دسته بندی موزیک
                                                        </option>
                                                        <option value="volvo" class="form-control form-select-lg mb-5">
                                                            Volvo
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text" class="form-control" placeholder="موضوع">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>متن اهنگ</label>
                                                    <div class="form-group bmd-form-group">
                                                        <textarea class="form-control" rows="5"
                                                                  placeholder=".. "></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group bmd-form-CEO / CO-FOUNDERgroup">
                                                    <vue3-tags-input :tags="tags"
                                                                     placeholder="تگ محتوایی "/>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary ">ارسال </button>
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
    methods: {
        storeFile() {

        }
    },
}
</script>
<style scoped>

</style>
