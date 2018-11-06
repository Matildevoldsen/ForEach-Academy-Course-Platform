import router from './router'
import store from './vuex'
import localforage from 'localforage'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

localforage.config({
    driver: localforage.LOCALSTORAGE,
    storeName: 'ForEach'
})

require('./bootstrap')

window.Vue = require('vue')

Vue.use(VueMaterial)


Vue.component('app', require('./components/App.vue'))
Vue.component('navigation', require('./components/Navigation.vue'))

store.dispatch('auth/setToken').then(()=>{
    store.dispatch('auth/fetchUser').catch(() => {
        store.dispatch('auth/clearAuth')
        router.replace({name: 'login'})
    })
}).catch(() => {
    store.dispatch('auth/clearAuth');
})

const app = new Vue({
    el: '#app',
    store: store,
    router: router
})

