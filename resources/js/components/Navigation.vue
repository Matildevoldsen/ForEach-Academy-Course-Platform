<template>
    <nav>
        <div v-if="!user.authenticated">
            <router-link :to="{name: 'login'}">Login</router-link>
            <router-link :to="{name: 'register'}">Register</router-link>
        </div>
        <div v-if="user.authenticated">
            <router-link :to="{name: 'home'}">{{ user.data.name }}</router-link>
        </div>
    </nav>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        computed: mapGetters({
            user: 'auth/user'
        })
    }
</script>