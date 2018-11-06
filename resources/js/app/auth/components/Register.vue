<template>
    <md-content>
        <md-card>
            <md-card-header>
                <div class="md-title"><md-icon>person_add</md-icon> Register</div>
            </md-card-header>

            <md-card-content>
                <form method="post" role="form" @submit.prevent="submit">
                    <md-field v-bind:class="{ 'has-error': errors.name}">
                        <label>Full Name</label>
                        <md-input autocomplete="dospwp" v-model="name" value="" type="text" name="name"></md-input>
                        <span v-if="errors.name" class="md-helper-text">
                            {{ errors.name[0] }}
                        </span>
                    </md-field>

                    <md-field v-bind:class="{ 'has-error': errors.phone}">
                        <label>Phone Number</label>
                        <md-input autocomplete="dospwp" v-model="phone" value="" type="tel" name="phone"></md-input>
                        <span v-if="errors.phone" class="md-helper-text">
                            {{ errors.phone[0] }}
                        </span>
                    </md-field>

                    <md-autocomplete v-bind:class="{ 'has-error': errors.country}" autocomplete="odoeieido_off" v-model="country" :md-options="countries">
                        <label>Country</label>

                        <template slot="md-autocomplete-item" slot-scope="{ item, term }">
                            <md-highlight-text :md-term="term">{{ item }}</md-highlight-text>
                        </template>

                        <template slot="md-autocomplete-empty" slot-scope="{ term }">
                            No countries matching "{{ term }}" were found. Contact us if you think this might be a mistake! Email <a href="mailto: hello@foreach.academy">hello@foreach.academy</a>
                        </template>
                    </md-autocomplete>


                    <md-field v-bind:class="{ 'has-error': errors.email}">
                        <label>E-mail</label>
                        <md-input v-model="email" autocomplete="odoeieido_off" value="" type="email"></md-input>
                        <span v-if="errors.email" class="md-helper-text">
                            {{ errors.email[0] }}
                        </span>
                    </md-field>

                    <md-field v-bind:class="{ 'has-error': errors.password}">
                        <label>Password</label>
                        <md-input autocomplete="dospwp" v-model="password"  value="" type="password"
                                  ></md-input>
                        <span v-if="errors.password" class="md-helper-text">
                            {{ errors.password[0] }}
                        </span>
                    </md-field>

                    <md-button class="md-dense md-raised" type="submit">Submit</md-button>
                </form>
            </md-card-content>
        </md-card>
    </md-content>
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
                countries: ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas"
                    ,"Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands"
                    ,"Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica"
                    ,"Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea"
                    ,"Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana"
                    ,"Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India"
                    ,"Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia"
                    ,"Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania"
                    ,"Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia"
                    ,"New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal"
                    ,"Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles"
                    ,"Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan"
                    ,"Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia"
                    ,"Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","United States Minor Outlying Islands","Uruguay"
                    ,"Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"],
                country: null,
                errors: [],
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
                }).then(() => {
                    this.$router.replace({name: 'home'});
                })
            }
        }
    }
</script>