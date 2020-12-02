<template>
    <div>
        <v-container class="mt-2">
            <v-row class="mt-2" justify="start">
                <h3>お客様登録</h3>
            </v-row>
            <v-row class="mt-2" justify="start">
                <ul>
                    <li>
                        <label for="name">名前</label>
                        <input type="text" name="name" id="name" v-model="customer_name">
                    </li>
                    <li>
                        <label for="phone">電話</label>
                        <input type="text" name="phone" id="phone" v-model="phone_number">
                    </li>
                    <li>
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" v-model="email">
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

            };
        },
        created: function () {},
        mounted: function () {},
        computed: {},
        methods: {

        }
    };
</script>

<style scoped>
    ul {
        list-style: none;
    }
</style>
