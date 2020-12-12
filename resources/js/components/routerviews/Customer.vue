<template>
    <div>
        <v-container class="mt-2">
            <v-row class="mt-2" justify="start">
                <h3>お客様登録</h3>
            </v-row>
            <v-row class="mt-2" justify="start">
                <ul>
                    <li>
                        <label for="name">名前:</label>
                        <input type="text" name="name" id="name" v-model="customer_name">
                    </li>
                    <li>
                        <label for="phone">電話:</label>
                        <input type="text" name="phone" id="phone" v-model="phone_number">
                    </li>
                    <li>
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" v-model="email">
                    </li>
                </ul>
            </v-row>
            <v-row>
                <table>

                </table>
            </v-row>
        </v-container>
    </div>
</template>

<script>
    import axios from './axios-auth.js';
    export default {
        name: 'Customer',
        components: {},
        props: {},
        data: function () {
            return {
                showContent: false,
                customer_id: "",
                customer_name: "",
                phone_number: "",
                email: "",
                customers: [],
                customer: "",
            };
        },
        created: function () {},
        mounted: function () {},
        computed: {},
        methods: {
            getCustomers() {
                axios
                  .get('/api/customers')
                  .then((result) => {
                      this.customers = result.data;
                      return console.log(result.data);
                  }).catch((err) => {
                      this.message = reponse.err.data;
                      return console.log(response.err.data);
                  });
            },
            postCustomer() {
                axios
                  .post('/api/cutomers', {
                      customer_name: this.customer_name,
                      phone_number = this.phone_number,
                      email = this.email,
                  })
                  .then((result) => {
                      this.getCustomers();
                      this.customer_name = "";
                      this.phone_number = "";
                      this.email = "";
                      this.customer = response.data;
                      return console.log(response.data);
                  }).catch((err) => {
                      this.message = err.reponse.data;
                      return console.log(err.response.data);
                  });
            }

        }
    };
</script>

<style scoped>
    ul {
        list-style: none;
    }
</style>
