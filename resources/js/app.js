require('datejs');

import Vue from "vue";
import store from './store/index';
import router from "./router/index";

window.addEventListener('load', function (event) {
    new Vue({
        router,
        store
    }).$mount('#app');
});
