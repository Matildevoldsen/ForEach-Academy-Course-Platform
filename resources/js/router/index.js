import Vue from 'vue'
import Router from 'vue-router'
import { routes as routes } from '../app/index'
import beforeEach from './beforeEach'
import NProgress from 'nprogress';
import '../../../node_modules/nprogress/nprogress.css'
Vue.use(Router)

const router = new Router({
    routes: routes,
})

router.beforeResolve((to, from, next) => {
    if (to.name) {
        NProgress.start()
    }
    next()
});

router.afterEach((to, from) => {
    NProgress.done()
})

router.beforeEach(beforeEach);

export default router