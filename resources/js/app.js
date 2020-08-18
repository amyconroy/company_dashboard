import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import VueAxios from "vue-axios";
import axios from "axios";
Vue.use(VueAxios, axios);

import App from "./views/App";
import Companies from "./components/Companies";
import AddCompany from "./components/AddCompany";
import UploadFile from "./components/UploadFile";
import Files from "./components/files";

const router = new VueRouter({
    mode: "history",
    routes: [
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
        {
            path: "/files",
            name: "files",
            component: Files,
        },
    ],
});

const app = new Vue({
    el: "#app",
    components: { App },
    router,
});
