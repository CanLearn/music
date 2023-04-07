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
                                    <router-link :to="{ name : 'membership_create' }"
                                                 class="btn btn-outline-secondary btn-md float-left text-dark ">
                                        <li class="fa fa-user pl-2"></li>
                                        ایچاد اشتراک ویژه
                                    </router-link>
                                    <h4 class="card-title "> لیست اشتراک </h4>
                                    <p class="card-category"> کسایی در سایت اشتراک خریدن </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    نام
                                                </th>

                                                <th>
                                                    قیمت
                                                </th>
                                                <th>
                                                    الویت
                                                </th>
                                                <th>
                                                    توضیعات
                                                </th>
                                                <th>
                                                    سالانه
                                                </th>
                                                <th>
                                                    عملیات
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr v-for="(member, index) in menubars.data " :key="member.id">
                                                <td>
                                                    {{ member.id }}
                                                </td>
                                                <td>
                                                    {{ member.name }}
                                                </td>
                                                <td>
                                                    {{ member.price }}
                                                </td>
                                                <td>
                                                    {{ member.priority }}
                                                </td>
                                                <td>
                                                    {{ member.description }}
                                                </td>
                                                <td>
                                                    {{ member.type }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <router-link
                                                        :to="{ name: 'member_edit'  , params: {   id : member.id }  }"
                                                        title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button @click="deleteMembership(member.id , index)" title="حذف"
                                                            class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!--                                        <pagination :data="users" @pagination-change-page="getUsers"></pagination>-->
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
import {Bootstrap5Pagination} from 'laravel-vue-pagination';

export default {
    name: "App",
    components: {SliderBar, NavBar, Bootstrap5Pagination},
    data() {
        return {
            menubars: [],

        }
    },
    created() {
        this.getMembership();
    },
    methods: {
        getMembership()
        {
            axios.get('http://127.0.0.1:8000/api/membership')
                .then(({data}) => {
                    this.menubars = data
                })
        },


        deleteMembership(id, index)
        {
            swal.confirm().then((result) => {
                if (result.value) {
                    axios.delete(`http://127.0.0.1:8000/api/membership/${id}`)
                        .then(data => {
                            this.$router.splice(index, 1);
                        })
                }
            })

        }

    },

}

</script>
