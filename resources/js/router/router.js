import { createRouter , createWebHistory} from "vue-router";
import routes from './route.js';

const route = createRouter({
    routes ,
    history : createWebHistory()
});

export default route ;
