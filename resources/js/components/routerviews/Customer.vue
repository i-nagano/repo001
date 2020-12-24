<template>
    <div>
        <v-container class="mt-2">
            <v-row class="mt-2" justify="start">
                <h5>お客様登録</h5>
            </v-row>
            <v-row class="mt-2" justify="start">
                <ul>
                    <li>
                        <label for="name">名前:</label>
                        <input type="text" name="name" id="name" v-model="$data.customer_name">
                    </li>
                    <li>
                        <label for="phone">電話:</label>
                        <input type="text" name="phone" id="phone" v-model="$data.phone_number">
                    </li>
                    <li>
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" v-model="$data.email">
                    </li>
                    <li align="right">
                        <button class="btn btn-outline-dark" v-on:click="postCustomer">登録</button>
                    </li>
                </ul>
            </v-row>
            <v-row>
                <table>
                    <thead class="table-row">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                名前
                            </th>
                            <th>
                                電話
                            </th>
                            <th>
                                Email
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="customer in customers" v-bind:key="customer.id">
                            <td>
                                {{ customer.customer_id }}
                            </td>
                            <td>
                                {{ customer.customer_name }}
                            </td>
                            <td>
                                {{ customer.phone_number }}
                            </td>
                            <td>
                                {{ customer.email }}
                            </td>
                            <td>
                                <button>編集</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </v-row>
            <v-row>
                <ul v-show="showError">
                    <li>エラーメッセージ:</li>
                    <li>
                        {{ $data.message }}
                    </li>
                </ul>
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
                showError: false,
                showContent: false,
                message: "",
                customer_id: "",
                customer_name: "",
                phone_number: "",
                email: "",
                customers: [],
                customer: "",
            };
        },
        created: function () {
            this.getCustomers();
        },
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
                      this.message = err.result.data;
                      this.showError = true;
                    //   console.log(result.err.data);
                  });
            },
            postCustomer() {
                let new_id = '',
                    id_max = '';
                    if(this.customers.length > 0) {
                        id_max = this.customers[this.customers.length - 1].id;
                        new_id = id_max + 1;
                    } else {
                        new_id = this.customers.length + 1;
                    };
                axios
                  .post('/api/customers', {
                      customer_id: new_id,
                      customer_name: this.customer_name,
                      phone_number: this.phone_number,
                      email: this.email,
                  })
                  .then((result) => {
                      this.getCustomers();
                      this.customer_name = "";
                      this.phone_number = "";
                      this.email = "";
                      this.customer = result.data;
                    //   console.log(result.data);
                  }).catch((err) => {
                      this.message = err.result.data;
                      this.showError = true;
                    //   console.log(err.result.data);
                  });
            },
        },
    };
</script>

<style scoped>
    ul {
        list-style: none;
    }

    .table-row {
        background-color: #fff;
    }

    .table-row:hover {
        background-color: #ddd;
    }
</style>
