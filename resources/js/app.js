import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import VueAxios from "vue-axios";
import axios from "axios";
Vue.use(VueAxios, axios);


import App from "./views/App";
import Companies from "./components/Companies";
import Home from "./views/Home";
import AddCompany from "./components/AddCompany";
import UploadFile from "./components/UploadFile";


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/companies",
            name: "companies",
            component: Companies,
        },
        {
            path: "/company/create",
            name: "addCompany",
            component: AddCompany,
        },
        {
            path: "/files/upload",
            name: "uploadFile",
            component: UploadFile,
        },
    ],
});

const app = new Vue({
    el: "#app",
    components: { App },
    router,
});
