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
                                    <h4 class="card-title">بیوگرافی  </h4>
                                    <p class="card-category ">ساختن بیوگرافی </p>
                                </div>
                                <div class="card-body">
                                    <form  @submit.prevent="storeFile"  enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group bmd-form-group pt-4" >
                                                    <input type="text" v-model="form.title" name="title"    class="form-control" placeholder="موضوع ">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-3"> انتخاب عکس موضوع </span>
                                                    <input type="file" @change="imagesTitle"   class="form-control bg-mdb-color btn btn-secondary" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group pt-4" >
                                                    <input type="text" v-model="form.name" name="name"   class="form-control" placeholder="نام خواننده ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group pt-4" >
                                                    <input type="text" v-model="form.last_name" name="last_name"   class="form-control" placeholder="فامیل خواننده ">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group bmd-form-group">
                                                        <textarea v-model="form.coption_music"   class="form-control" name="coption_music" rows="3"
                                                                  placeholder="متن اول "></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-3"> انتخاب عکس اول   </span>
                                                    <input type="file" @change="first_image"  class="form-control bg-mdb-color btn btn-secondary" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pb-5  ">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text" v-model="form.title_image" name="title_image"   class="form-control" placeholder="موضوع عکس">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group bmd-form-group">
                                                        <textarea  v-model="form.coption_two_music"  class="form-control" name="coption_two_music" rows="3"
                                                                   placeholder="متن دوم "></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-3"> انتخاب عکس دوم  </span>
                                                    <input type="file" @change="seconde_image" class="form-control bg-mdb-color btn btn-secondary" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pb-5  ">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text"  v-model="form.title_two_image" name="title_two_image"  class="form-control" placeholder="موضوع عکس">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pb-5  ">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text"  v-model="form.license" name="license"  class="form-control" placeholder="موضوع مچوز و کنسرت">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-3"> انتخاب عکس کنسرت  </span>
                                                    <input type="file" @change="concert_image"   class="form-control bg-mdb-color btn btn-secondary" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 pb-5  ">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text" v-model="form.title_concert_image" name="title_concert_image"   class="form-control" placeholder="موضوع عکس">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group bmd-form-group">
                                                        <textarea  v-model="form.list_album" name="list_album"  class="form-control" rows="3"
                                                                   placeholder="لیست البوم ها "></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group bmd-form-group">
                                                        <textarea  v-model="form.list_music" name="list_music"  class="form-control" rows="3"
                                                                   placeholder="لیست اهنگ ها "></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                            <div class="col-md-12">-->
                                            <!--                                                <div class="form-group bmd-form-group">-->
                                            <!--                                                    <vue3-tags-input :tags="tags" name="tags" v-model="form.tags"-->
                                            <!--                                                                     placeholder="تگ محتوایی "/>-->
                                            <!--                                                </div>-->
                                            <!--                                            </div>-->
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary ">ارسال </button>
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
import Vue3TagsInput from 'vue3-tags-input';
import axios from "axios";

export default {
    components: {SliderBar , NavBar , Vue3TagsInput},
    data() {
        return {
            tags: [] ,
            items: [] ,

            form  : {
                title :  null,
                images_title : null,
                name : null,
                last_name : null,
                coption_music :null,
                first_image : null,
                title_image : null,
                coption_two_music : null,
                seconde_image : null,
                title_two_image : null,
                license : null,
                concert_image : null,
                title_concert_image :null,
                list_album : null,
                list_music : null,

            }
        }
    },
    methods: {
        imagesTitle(event)
        {// console.log( this.form.images_title = event.target.files[0])
            this.form.images_title = event.target.files[0];
        },
        first_image(event){
            this.form.first_image = event.target.files[0];
        },
        seconde_image(event) {
            this.form.seconde_image = event.target.files[0];
        },
        concert_image(event) {
            this.form.concert_image = event.target.files[0];
        },


        storeFile() {
            let formData = new FormData();
            console.log(this.form.images_title);
            formData.append('images_title', this.form.images_title );
            formData.append('title', this.form.title );
            formData.append('name', this.form.name );
            formData.append('last_name', this.form.last_name );
            formData.append('coption_music', this.form.coption_music );
            formData.append('first_image', this.form.first_image );
            formData.append('title_image', this.form.title_image );
            formData.append('coption_two_music', this.form.coption_two_music );
            formData.append('seconde_image', this.form.seconde_image );
            formData.append('title_two_image', this.form.title_two_image );
            formData.append('license', this.form.license );
            formData.append('concert_image', this.form.concert_image );
            formData.append('title_concert_image', this.form.title_concert_image );
            formData.append('list_album', this.form.list_album );
            formData.append('list_music', this.form.list_music );
            console.log(formData)
            axios.post('http://127.0.0.1:8000/api/rezomes' , formData)
                .then(({data}) => {
                    console.log(data)
                    this.$router.push({ name: 'biographi' });
                    swal.message();
                })
        },

    },

}
</script>
<style scoped>

</style>
