<template>
    <div>

    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'PersistentFull',
        data: () => ({
            menuVisible: false
        }),
        computed: mapGetters({
            user: 'auth/user'
        }),
        methods: {
            ...mapActions({
                logout: 'auth/logout'
            }),
            toggleMenu() {
                this.menuVisible = !this.menuVisible
            }
        }
    }
</script>
