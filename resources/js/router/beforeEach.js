import store from '../vuex'
import localforage from 'localforage'

const beforeEach = ((to, from, next) => {
    store.dispatch('auth/checkTokenExists').then(() => {
        if (to.meta.guest) {
            next({ name: 'home' })
            return
        }
        next()
    }).catch(() => {
        if (to.meta.needsAuth) {
            console.log(from.path)
            localforage.setItem('intended', to.name)
            next({ name: from.path.substr(1) })
            return
        }
        next()
    })
})

export default beforeEach