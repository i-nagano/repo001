<template>
    <div>
        <v-container>
            <v-card v-for="sweet in sweets" v-bind:key="sweet.id" width="300" class="ma-1">
                <v-card-title>
                    {{ sweet.sweet_id }}, {{ sweet.sweet_name }}, {{ sweet.unit_price }}
                </v-card-title>
            </v-card>
        </v-container>
        <v-card>
            <v-container>
                <v-row>
                    <v-col v-for="sweet in sweets" v-bind:key="sweet.id">
                        <v-card outlined tile height="100" width="150">
                            {{ sweet.sweet_id }}, {{ sweet.sweet_name }}, {{ sweet.unit_price }}
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-card>
        <v-container>
            <v-row class="blue lighten-4" style="height: 120px;">
                <v-col cols=2>
                    <v-card color="blue" outlined tile height=100>a</v-card>
                </v-col>
                <v-col cols=2>
                    <v-card color="blue" outlined tile height=100>b</v-card>
                </v-col>
                <v-col cols=2>
                    <v-card color="blue" outlined tile height=100>c</v-card>
                </v-col>
                <v-col cols=2>
                    <v-card color="blue" outlined tile height=100>d</v-card>
                </v-col>
            </v-row>
            <v-row class="blue lighten-4" style="height: 250px;">
                <v-col cols=2 v-for="n in 10" :key="n">
                    <v-card color="blue" outlined tile height=100>文字</v-card>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
    import axios from './axios-auth.js';
    export default {
        name: 'Register',
        components: {},
        props: {},
        data: function () {
            return {
                customers: [],
                sweets: [],
                showError: "",
            };
        },
        created: function() {
            this.getCustomers();
            this.getSweets();
        },
        mounted: function() {},
        methods: {
            getCustomers() {
                axios
                  .get('/api/customers')
                  .then(response => {
                      this.customers = response.data;
                      console.log(response.data);
                  })
                  .catch(error => {
                      this.message = error.response.data;
                      this.showError = true;
                    //   console.log(error.response.data);
                  });
            },
            getSweets() {
                axios
                  .get('/api/sweets')
                  .then(response => {
                      this.sweets = response.data;
                      console.log(this.response.data);
                  })
                  .catch(error => {
                      this.message = error.response.data;
                      this.showError = true;
                    //   console.log(error.response.data);
                  });
            },
        },
    };
</script>

<style scoped>

</style>
