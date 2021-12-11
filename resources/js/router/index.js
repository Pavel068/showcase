import Vue from 'vue';
import VueRouter from "vue-router";

import routes from "./routes";

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title;

    if (to.matched.some(record => record.meta.auth)) {
        if (!store.getters.accessToken(store.state)) {
            next({
                name: 'Index'
            });
        }
    }

    next();
});

Vue.use(VueRouter);

export default router;
