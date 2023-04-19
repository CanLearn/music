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

                                    <form @submit.prevent="storeFile" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group pt-4">
                                                    <input type="text" name="name_persion" v-model="form.name_persion"
                                                           class="form-control"
                                                           placeholder="نام خواننده ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group pt-4">
                                                    <input type="text" name="name_english" v-model="form.name_english"
                                                           class="form-control"
                                                           placeholder="نام خواننده انگلیسی ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text" name="name_music_persion"
                                                           v-model="form.name_music_persion" class="form-control"
                                                           placeholder="نام اهنگ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text" name="name_music_english"
                                                           v-model="form.name_music_english" class="form-control"
                                                           placeholder="نام اهنگ انگلیسی">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-3"> انتخاب عکس اهنگ </span>
                                                    <input type="file" name="image" @change="image"
                                                           class="form-control bg-mdb-color btn btn-secondary">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-3"> انتخاب البوم </span>
                                                    <input type="file" name="album" @change="album"
                                                           class="form-control bg-mdb-color btn btn-secondary">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-1"> انتخاب کیفیت 320 </span>
                                                    <input type="file" name="file_320" @change="file_320"
                                                           class="form-control bg-mdb-color btn btn-secondary">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-1"> انتخاب کیفیت 120 </span>
                                                    <input type="file" name="file_120" @change="file_120"
                                                           class="form-control bg-mdb-color btn btn-secondary">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <div class="">
                                                    <span class="fs-3 pb-1"> انتخاب کیفیت wav </span>
                                                    <input type="file" name="file_wav" @change="file_wav"
                                                           class="form-control bg-mdb-color btn btn-secondary">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group bmd-form-group">
                                                <tags-input
                                                    element-id="tags"
                                                    v-model="form.category"
                                                    placeholder="دسته بندی پر کنید  :)"
                                                    name="category"
                                                    :only-existing-tags="true"
                                                    :existing-tags="categorys"
                                                    :typeahead="true"
                                                >
                                                </tags-input>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text" name="title" v-model="form.title"
                                                           class="form-control" placeholder="موضوع">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group">
                                                    <input type="text" name="slug" v-model="form.slug"
                                                           class="form-control" placeholder="اسلاگ">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>متن اهنگ</label>
                                                    <div class="form-group bmd-form-group">
                                                        <textarea class="form-control" v-model="form.caption" rows="3"
                                                                  name="caption"
                                                                  placeholder=".. "></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div  class="form-group bmd-form-group">
                                                   <span @click="removeTags(index)"> <i class="fas fas-times" ></i> </span>
                                                    <input name="tags" v-model="tagValue" @keyup.space="addTags" class="form-control" />
                                                    {{ tagValue  }}
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary ">ارسال</button>
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
import TagsInput from '@voerro/vue-tagsinput'
export default {
    name: "App",
    components: {SliderBar, NavBar, Vue3TagsInput, TagsInput},
    data() {
        return {
            tagValue: '',

            tags: [],
            items: [],
            categorys: [],
            form: {
                name_persion: null,
                name_english: null,
                name_music_persion: null,
                name_music_english: null,
                image: null,
                album: null,
                file_320: null,
                file_120: null,
                file_wav: null,
                title: null,
                slug: null,
                caption: null,
                category : [],
                tags: null,
            }
        }
    },
    created() {

        getCategory : {
                    axios.get('http://127.0.0.1:8000/api/search/category')
                    .then(({ data }) => {
                            this.categorys = data.data;
                            console.log(this.categorys)
                        })
                      }
    },
    methods: {


        album(event) {
            this.form.album = event.target.files[0];
        },
        image(event) {
            this.form.image = event.target.files[0];
        },
        file_320(event) {

            this.form.file_320 = event.target.files[0];
        },
        file_120(event) {

            this.form.file_120 = event.target.files[0];
        },
        file_wav(event) {
            this.form.file_wav = event.target.files[0];
        },
        addTags() {
            if (!this.tagValue == '') {
                this.form.tags.push(this.tagValue)
            }
        },


        removeTags(index) {
            this.form.tags.splice(index, 1)
        },

        storeFile() {

            let formData = new FormData();
            formData.append('name_persion', this.form.name_persion);
            formData.append('name_english', this.form.name_english);
            formData.append('name_music_persion', this.form.name_music_persion);
            formData.append('name_music_english', this.form.name_music_english);
            formData.append('image', this.form.image);
            formData.append('album', this.form.album);
            formData.append('file_320', this.form.file_320);
            formData.append('file_120', this.form.file_120);
            formData.append('file_wav', this.form.file_wav);
            formData.append('title', this.form.title);
            formData.append('slug', this.form.slug);
            formData.append('caption', this.form.caption);
            formData.append('tags', this.form.tags);
            formData.append('category', this.form.category);

            axios.post('http://127.0.0.1:8000/api/files', formData)
                .then(({ data }) => {
                    this.$router.push({name: 'files'});
                    swal.message();
                })
        }

    },

}
</script>
<style scoped>

</style>
