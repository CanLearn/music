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
                                <div class="card_header card-header-primary">
                                   <span class="fs-5 font-weight-bold">
                                        تخفیفات
                                   </span>
                                    <i class="fa fa-money"></i>
                                    <router-link :to="{ name : 'discount_create' }"
                                                 class="float-left btn btn-outline-secondary">
                                        ایجاد کد تحغیف جدید
                                        <i class="fa fa-credit-card">
                                        </i>
                                    </router-link>
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
                                                    موضوع
                                                </th>

                                                <th>
                                                    نام
                                                </th>
                                                <th>
                                                    کد
                                                </th>
                                                <th>
                                                    درصد
                                                </th>
                                                <th>
                                                    تاریخ ساخت
                                                </th>
                                                <th>
                                                    عملیات
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr
                                                v-for="(discount , index) in discounts.data" :key="discount.id"
                                            >
                                                <td>
                                                    {{ discount.id }}
                                                </td>
                                                <td>
                                                    {{ discount.title }}
                                                </td>
                                                <td>
                                                    {{ discount.name }}
                                                </td>
                                                <td>
                                                    {{ discount.code }}
                                                </td>
                                                <td>
                                                    {{ discount.percent }}
                                                </td>
                                                <td>
                                                    {{ moment(discount.created_at).format('jYYYY/jM/jD') }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <router-link
                                                        :to="{ name : 'discount_edit' , params : { id : discount.id }  }"
                                                        title="ویرایش" class="btn btn-info btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button @click="deleteDiscount(discount.id , index)" title="حذف"
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
import moment from "moment-jalaali";
import axios from "axios";

export default {
    name: "App",
    components: {SliderBar, NavBar},
    data() {
        return {
            moment: moment,
            discounts : []
        }
    },

    created() {
    this.getDiscount();
    },

    methods: {
        getDiscount ()  {
            axios.get('http://127.0.0.1:8000/api/discount')
                .then(({data}) => {
                    this.discounts = data
                })
        },
        deleteDiscount (id , index)
        {
            swal.confirm().then((result) => {
                if(result.value) {
                    axios.delete(`http://127.0.0.1:8000/api/discount/${id}`)
                        .then(({data}) => {
                            this.getDiscount();
                        })
                }
            })
        }
    },
}

</script>
