<template>
    <div>
        <v-container class="mt-2">
            <v-row class="mt-2" justify="start">
                <h5>商品登録</h5>
            </v-row>
            <v-row class="mt-2" justify="start">
                <ul>
                    <li>
                        <label for="sweet_name">商品名:</label>
                        <input type="text" name="sweet_name" id="sweet_name" v-model="sweet_name">
                    </li>
                    <li>
                        <label for="unit_price">単　価:</label>
                        <input type="text" name="unit_price" id="unit_price" v-model="unit_price">
                    </li>
                    <li align="right">
                        <button v-on:click="postSweet" class="btn btn-outline-dark">登録</button>
                    </li>
                </ul>
            </v-row>
        </v-container>
    </div>
</template>

<script>
    import axios from './axios-auth.js';
    export default {
        name: 'Sweet',
        components: {},
        props: {},
        data: function () {
            return {
                showContent: false,
                message: "",
                sweet_name: "",
                unit_price: "",
                sweets: [],
                sweetUpdate: "",
            };
        },

    };
</script>

<style scoped>
    ul {
        list-style: none;
    }
</style>
