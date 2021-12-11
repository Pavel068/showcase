require('datejs');

import Vue from "vue";
import store from './store/index';
import router from "./router/index";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

window.addEventListener('load', function (event) {
    new Vue({
        router,
        store
    }).$mount('#app');
});
