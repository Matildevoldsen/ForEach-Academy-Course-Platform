<template>
    <Container>
        <md-card>
            <md-card-header>
                <div class="md-title"><md-icon>lock</md-icon> Login</div>
            </md-card-header>

            <md-card-content>
                <form method="post" role="form" @submit.prevent="submit">
                    <md-field v-bind:class="{ 'has-error': errors.email}">
                        <label>E-mail</label>
                        <md-input v-model="email" autocomplete="off" value="" type="email" name="email"></md-input>
                        <span v-if="errors.email" class="md-helper-text">
                            {{ errors.email[0] }}
                        </span>
                    </md-field>

                    <md-field v-bind:class="{ 'has-error': errors.password}">
                        <label>Password</label>
                        <md-input v-model="password" value="" type="password" autocomplete="off"
                                  name="password"></md-input>
                        <span v-if="errors.password" class="md-helper-text">
                            {{ errors.password[0] }}
                        </span>
                    </md-field>

                    <md-button class="md-dense md-raised md-primary" type="submit">Submit</md-button>
                </form>
            </md-card-content>
        </md-card>
    </Container>
</template>


<script>
    import {mapActions} from 'vuex'

    export default {
        data() {
            return {
                password: null,
                email: null,
                errors: []
            }
        },
        methods: {
            ...mapActions({
                login: 'auth/login'
            }),
            submit() {
                this.login({
                    payload: {
                        email: this.email,
                        password: this.password
                    },
                    context: this
                }).then(() => {
                    this.$router.replace({name: 'home'});
                })
            }
        }
    }
</script>
