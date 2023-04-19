<template>
        <div class="content display-rtl px-70%">
            <div class="container">
                <div class="row">
                   <div class="col-md-10">
                   <div class="card ">
                        <div class="col-md-10 align-content-center">
                                    <span class="pb-3 align-content-center">
                                        صفحه ورورد به سایت اصلی
                                    </span>
                            <span class="alert alert-danger" v-if="error == 422" >
                                {{ error }}
                            </span>
                            <span class="alert alert-success" v-if="error == 200" >
                               به درستی ذخیره شده
                            </span>
                                <form @submit.prevent="login" enctype="multipart/form-data" class="">
                                    <div class="form-group w-100">
                                        <label>ایمیل وارد کنید </label>
                                        <input type="email" class="form-control" name="email" v-model="form.email" >
                                    </div>
                                    <div class="form-group">
                                      <label >رمز عبور</label>
                                      <input type="password" class="form-control" name="password" v-model="form.password" >
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                        </div>
                   </div>
                   </div>
                </div>
            </div>
        </div>
</template>



<script >
import axios from 'axios'

export default {
    data() {
        return {
            form : {
                email : '' ,
                password : '',

            },
            error : ''
        }
    },

    methods : {
        login ()
        {
            axios.post('http://127.0.0.1:8000/api/login' , this.form)
             .then((data) => {
                 console.log(data)
                this.$router.push('admin');
             }).catch((e)=> {
                 this.erroe = e
            })
        }
    }
}


</script>
