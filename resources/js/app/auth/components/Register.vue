<template>
    <div class="container">
        <p>Register</p>
        <form method="post" role="form" @submit.prevent="submit">
            <div v-bind:class="{ 'has-error': errors.name}">
                <input type="text" v-model="name" autofocus placeholder="Full Name"/>

                <span class="help error" v-if="errors.name">
                    {{ errors.name[0] }}
                </span>
            </div>

            <div v-bind:class="{ 'has-error': errors.phone}">
                <input type="tel" v-model="phone" placeholder="Phone Number"/>
                <span class="help error" v-if="errors.name">
                    {{ errors.phone[0] }}
                </span>
            </div>

            <div v-bind:class="{ 'has-error': errors.email}">
                <input type="email" v-model="email" placeholder="E-mail"/>
                <span class="help error" v-if="errors.name">
                    {{ errors.email[0] }}
                </span>
            </div>

            <div v-bind:class="{ 'has-error': errors.country}">
                <input type="country" v-model="country" placeholder="Country"/>
                <span class="help error" v-if="errors.country">
                    {{ errors.country[0] }}
                </span>
            </div>

            <div v-bind:class="{ 'has-error': errors.password}">
                <input type="password" v-model="password" name="password" placeholder="Password"/>
                <span class="help error" v-if="errors.password">
                    {{ errors.password[0] }}
                </span>
            </div>

            <input type="submit"/>
        </form>
    </div>
</template>

<script>
    import {mapActions} from 'vuex'

    export default {
        data() {
            return {
                name: null,
                password: null,
                phone: null,
                email: null,
                country: null,
                errors: []
            }
        },
        methods: {
            ...mapActions({
                register: 'auth/register'
            }),
            submit() {
                this.register({
                    payload: {
                        name: this.name,
                        phone: this.phone,
                        email: this.email,
                        country: this.country,
                        password: this.password
                    },
                    context: this
                })
            }
        }
    }
</script>