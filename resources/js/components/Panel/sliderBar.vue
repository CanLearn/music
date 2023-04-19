<template>
    <div class="sidebar" data-color="purple" data-background-color="white" >

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active  ">
                    <router-link class="nav-link" :to="{ name : 'dashboard' }">
                        <i class="fa fa-dashboard"></i>
                        <p>دشبورد</p>
                    </router-link>
                </li>
                <li class="nav-item ">
                    <router-link class="nav-link" :to="{ name : 'user' }" >
                        <i class="fa fa-user"></i>
                        <p>کاربران </p>
                    </router-link>
                </li>

                <li class="nav-item ">
                    <router-link class="nav-link" :to="{ name : 'category' }" >
                        <i class="	fa fa-cog"></i>
                        <p>دسته بندی </p>
                    </router-link>
                </li>
                <li class="nav-item ">
                    <router-link :to="{ name : 'files' }" class="nav-link" >
                        <i class="fa fa-file"></i>
                        <p>فایل</p>
                    </router-link>
                </li>
                <li class="nav-item ">
                    <router-link class="nav-link" :to="{ name : 'role' }">
                        <i class="fa fa-500px"></i>
                        <p>نقش ها</p>
                    </router-link>
                </li>
                <li class="nav-item ">
                    <router-link class="nav-link" :to="{ name : 'membership' }">
                        <i class="fa fa-refresh"></i>
                        <p>اشتراک ویژه </p>
                    </router-link>
                </li>
                <li class="nav-item active-pro ">
                    <router-link class="nav-link" :to="{ name : 'chart' }" >
                        <i class="fa fa-bar-chart"></i>
                        <p>چارت </p>
                    </router-link>
                </li>
                <li class="nav-item ">
                    <router-link class="nav-link" :to="{ name : 'biographi'  } ">
                        <i class="	fa fa-angellist"></i>
                        <p> بیوگرافی </p>
                    </router-link>
                </li>
                <li class="nav-item ">
                    <router-link :to="{ name : 'discount' }"   class="nav-link" >
                        <i class="fa fa-bomb"></i>
                        <p>تخفیف </p>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
export default {
    name: "sliderBar"
}
</script>

<style scoped>

</style>
