require('./bootstrap');
require('./plugin/material-dashboard.min.js');
require('bootstrap-material-design');
import { createApp } from "vue";
import {PerfectScrollbar} from "vue3-perfect-scrollbar";
import 'vue3-perfect-scrollbar/dist/vue3-perfect-scrollbar.css'
// import App from './components/Panel/App.vue';
import AppLayout from './views/Layout/Applayout.vue';
import Route from "./router/router.js";
import { createStore } from 'vuex'
import axios from 'axios'
import VueAxios from 'vue-axios'
import { createMetaManager } from 'vue-meta'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';




createApp()
    .use(createStore)
    .use(Route)
    .use(PerfectScrollbar)
    .use(VueAxios, axios)
    .use(createMetaManager())
    .use(VueSweetalert2)
.mount('#app')

