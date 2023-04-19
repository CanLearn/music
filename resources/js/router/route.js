const AppLayout = () => import( /* webpackChunkName: "js/home" */ '../views/Layout/Applayout.vue');
const User = () => import(/* webpackChunkName: "js/user" */ '../views/Layout/users/Index.vue');
const UserCreate = () => import(/* webpackChunkName: "js/user_create" */ '../views/Layout/users/Create.vue');
const UserEdit = () => import(/* webpackChunkName: "js/user_edit" */ '../views/Layout/users/Edit.vue');
const Chart = () => import(/* webpackChunkName: "js/chart" */ '../views/Layout/Chart/Chart.vue');
const Dashboard = () => import(/* webpackChunkName: "js/dashboard" */ '../views/Layout/Dashboard/Dashboard.vue');
const Category = () => import(/* webpackChunkName: "js/category" */ '../views/Layout/Category/Index.vue');
const CategoryCreate = () => import(/* webpackChunkName: "js/category_create" */ '../views/Layout/Category/Create.vue');
const CategoryEdit = () => import(/* webpackChunkName: "js/category_edit" */ '../views/Layout/Category/Edit.vue');
const File = () => import(/* webpackChunkName: "js/file" */ '../views/Layout/Files/Index.vue');
const FilesCreate = () => import(/* webpackChunkName: "js/file_create" */ '../views/Layout/Files/Create.vue');
const FilesEdit = () => import(/* webpackChunkName: "js/file_edit" */ '../views/Layout/Files/Edit.vue');
const  Landing_page = () => import( /* webpackChunkName: "js/landing_page" */ '../views/Landing_page.vue');
const  NotFound = () => import( /* webpackChunkName: "js/not_found" */ '../views/NotFound.vue');
const Role = () => import(/* webpackChunkName: "js/role" */ '../views/Layout/Role.vue');
const MemberShip = () => import(/* webpackChunkName: "js/membership" */ '../views/Layout/MemberShip/Index.vue');
const Membership_create = () => import(/* webpackChunkName: "js/membership_create" */ '../views/Layout/MemberShip/Create.vue');
const Membership_edit = () => import(/* webpackChunkName: "js/membership_edit" */ '../views/Layout/MemberShip/Edit.vue');
const Biographi = () => import(/* webpackChunkName: "js/biographi" */ '../views/Layout/Biographi/Index.vue');
const BiographiEdit = () => import(/* webpackChunkName: "js/biographi_edit" */ '../views/Layout/Biographi/Edit.vue');
const BiographiCreate = () => import(/* webpackChunkName: "js/biographi_create" */ '../views/Layout/Biographi/Create.vue');
const Home = () => import(/* webpackChunkName: "js/home" */ '../views/Home.vue');
const Notification = () => import(/* webpackChunkName: "js/nofification" */ '../views/Layout/Notification/Index.vue');
const Login = () => import(/* webpackChunkName: "js/login" */ '../views/auth/Login.vue');
const Register = () => import(/* webpackChunkName: "js/register" */ '../views/auth/Register.vue');
const Discount = () => import(/* webpackChunkName: "js/discount" */ '../views/Layout/Discount/Index.vue');
const Discount_create = () => import(/* webpackChunkName: "js/discount_create" */ '../views/Layout/Discount/Create.vue');
const Discount_edit = () => import(/* webpackChunkName: "js/discount_edit" */ '../views/Layout/Discount/Edit.vue');





export default
[
    {
        path: '/home',
        name: 'home',
        component: Home
    },
    {
        path : '/' ,
        children :
           [
               {
                   path : '/admin' ,
                   name : 'admin' ,
                   component  : AppLayout
               },
               {
                   path : '/membership' ,
                   children: [
                       {
                           path: '/membership',
                           name : 'membership' ,
                           component: MemberShip
                       },
                       {
                           path : '/membership/create' ,
                           name : 'membership_create' ,
                           component : Membership_create
                       },
                       {
                           path : ':id' ,
                           name : 'member_edit' ,
                           component : Membership_edit
                       },
                   ]
               },

               {
                   path : '/users' ,
                   children :
                   [
                       {
                           path : '/users' ,
                           name : 'user',
                           component : User ,
                       },
                       {
                           path : 'users/create' ,
                           name : 'user_create',
                           component : UserCreate ,
                       },
                       {
                           path : ':id' ,
                           name : 'user_edit',
                           component : UserEdit ,
                       },
                   ]
               },
               {
                   path : '/files' ,
                   children :
                       [
                           {
                               path : '/files' ,
                               name : 'files',
                               component : File ,
                           },
                           {
                               path : 'files-create' ,
                               name : 'file_create',
                               component : FilesCreate ,
                           },
                           {
                               path : 'files/:id' ,
                               name : 'file_edit',
                               component : FilesEdit ,
                           },
                       ]
               },
               {
                   path: '/category' ,
                   children :
                       [
                           {
                               path : '/category' ,
                               name : 'category',
                               component : Category ,
                           },

                           {
                               path : ':id' ,
                               name : 'category_edit',
                               component : CategoryEdit ,
                           },
                           {
                               path : '/category/create' ,
                               name: 'category_create' ,
                               component : CategoryCreate
                           },


                       ]
               },
               {
                 path : '/discount',
                 children: [
                     {
                         path : '/discount' ,
                         name : 'discount' ,
                         component : Discount
                     },
                     {
                         path : 'discount/create' ,
                         name : 'discount_create' ,
                         component : Discount_create
                     },
                     {
                         path : ':id' ,
                         name : 'discount_edit' ,
                         component : Discount_edit
                     },


                 ]
               },
               {
                   path : '/role' ,
                   name: 'role' ,
                   component : Role
               },
               {
                   path : '/charts' ,
                   name : 'chart' ,
                   component : Chart
               },
               {
                   path : '/dashboard' ,
                   name : 'dashboard' ,
                   component : Dashboard
               },
               {
                   path: '/biogaphi' ,
                   children :
                       [
                           {
                               path : '/biogaphi' ,
                               name : 'biographi',
                               component : Biographi ,
                           },

                           {
                               path : ':id' ,
                               name : 'biographi_edit',
                               component : BiographiEdit ,
                           },
                           {
                               path : '/biographi/create' ,
                               name: 'biographi_create' ,
                               component : BiographiCreate
                           },


                       ]
               },

               {
                path : '/notification' ,
                name: 'notification' ,
                component : Notification
               },
               {
                path : '/login' ,
                name: 'login' ,
                component : Login
               },
               {
                   path : '/register' ,
                   name: 'register' ,
                   component : Register
               },
            ],

    },


    {
        path : '/landing_page',
        name : 'landing_page',
        components : Landing_page
    },
    {
        path : '/404',
        name : 'not_found',
        components : NotFound
    },




]


