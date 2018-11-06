import {Welcome} from '../components'

export default [
    {
        path: '/welcome',
        component: Welcome,
        name: 'welcome',
        meta: {
            guest: true,
            needsAuth: false
        }
    }
]