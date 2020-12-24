<template>
    <div>
        <v-card>
            <v-container>
                <v-row>
                    <v-col>1</v-col>
                    <v-col>2</v-col>
                    <v-col>3</v-col>
                    <v-col>4</v-col>
                    <v-col>5</v-col>
                    <v-col>6</v-col>
                    <v-col>7</v-col>
                    <v-col>8</v-col>
                    <v-col>9</v-col>
                    <v-col>10</v-col>
                    <v-col>11</v-col>
                    <v-col>12</v-col>
                    <v-col>13</v-col>
                    <v-col>14</v-col>
                    <v-col>15</v-col>
                    <v-col>16</v-col>
                    <v-col>17</v-col>
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

        },
        mounted: function() {

        },
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