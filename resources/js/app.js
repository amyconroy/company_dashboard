import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import VueAxios from "vue-axios";
import axios from "axios";
Vue.use(VueAxios, axios);


import App from "./views/App";
import Hello from "./views/Hello";
import Home from "./views/Home";
import AddCompany from "./components/AddCompany";


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/hello",
            name: "hello",
            component: Hello,
        },
        {
            path: "/company/create",
            name: "addCompany",
            component: AddCompany,
        },
    ],
});

const app = new Vue({
    el: "#app",
    components: { App },
    router,
});
