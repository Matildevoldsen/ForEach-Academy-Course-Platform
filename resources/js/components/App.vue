<template>
    <md-app class="md-scrollbar" style="min-height: 100vh;">
        <md-app-toolbar class="md-accent">
            <md-button class="md-icon-button" @click="toggleMenu" v-if="!menuVisible">
                <md-icon>menu</md-icon>
            </md-button>
            <span class="md-title"><router-link :to="{name: 'home'}" ><img src="../img/logo.png"></router-link></span>
        </md-app-toolbar>

        <md-app-drawer :md-active.sync="menuVisible" md-persistent="full">
            <md-toolbar class="md-transparent" md-elevation="0">
                <span v-if="user.authenticated">{{ user.data.name }}</span>
                <span v-if="!user.authenticated">ForEach Academy</span>

                <div class="md-toolbar-section-end">
                    <md-button class="md-icon-button md-dense" @click="toggleMenu">
                        <md-icon>keyboard_arrow_left</md-icon>
                    </md-button>
                </div>
            </md-toolbar>

            <md-list>
                <div v-if="!user.authenticated">
                    <md-list-item>
                        <md-icon>lock</md-icon>
                        <router-link class="md-list-item-text"
                                :to="{name: 'login'}">Login</router-link>
                    </md-list-item>

                    <md-list-item>
                        <md-icon>person_add</md-icon>
                        <router-link class="md-list-item-text"
                                :to="{name: 'register'}">Register</router-link>
                    </md-list-item>
                </div>

                <div v-if="user.authenticated">
                    <md-list-item>
                        <md-icon>home</md-icon>
                        <router-link class="md-list-item-text"
                                :to="{name: 'home'}">Home</router-link>
                    </md-list-item>

                    <md-list-item>
                        <md-icon>video_library</md-icon>
                        <span class="md-list-item-text"
                        >Courses</span>
                    </md-list-item>

                    <md-list-item>
                        <md-icon>library_books</md-icon>
                        <span class="md-list-item-text"
                        >Tutorials</span>
                    </md-list-item>

                    <md-list-item>
                        <md-icon>exit_to_app</md-icon>
                        <span class="md-list-item-text"><a href="#" @click.prevent="logout">Logout</a></span>
                    </md-list-item>
                </div>
            </md-list>
        </md-app-drawer>

        <md-app-content>
            <div class="container">
                <router-view>

                </router-view>
            </div>
        </md-app-content>
    </md-app>
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
