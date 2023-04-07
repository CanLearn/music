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
const AuthRoutes = () => import( /* webpackChunkName: "js/auth-routes" */ '../views/Authrouter/AuthRouter.vue');
const  Landing_page = () => import( /* webpackChunkName: "js/landing_page" */ '../views/Landing_page.vue');
const  NotFound = () => import( /* webpackChunkName: "js/not_found" */ '../views/NotFound.vue');
const Role = () => import(/* webpackChunkName: "js/role" */ '../views/Layout/Role.vue');
const MemberShip = () => import(/* webpackChunkName: "js/membership" */ '../views/Layout/MemberShip/Index.vue');
const Membership_create = () => import(/* webpackChunkName: "js/membership_create" */ '../views/Layout/MemberShip/Create.vue');
const Membership_edit = () => import(/* webpackChunkName: "js/membership_edit" */ '../views/Layout/MemberShip/Edit.vue');


export default [
    {
        path : '/' ,
        children :
           [
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
                   path : '' ,
                   component : AppLayout,
                   name : 'Home'
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
                               path : 'files/create' ,
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
                   path: '/auth/:url',
                   name: 'auth',
                   component: AuthRoutes,
                   props: true
               },
               {
                   path : '/dashboard' ,
                   name : 'dashboard' ,
                   component : Dashboard
               }
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


