import Vue from 'vue'
import Vuex from 'vuex'
import auth from '../app/auth/vuex'
import * as mutations from "../app/auth/vuex/mutations";

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        auth: auth
    },
    mutations: {
        ...auth.mutations
    }
})