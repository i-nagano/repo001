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
                        <input type="text" name="sweet_name" id="sweet_name" v-model="$data.sweet_name">
                    </li>
                    <li>
                        <label for="unit_price">単　価:</label>
                        <input type="text" name="unit_price" id="unit_price" v-model="$data.unit_price">
                    </li>
                    <li>
                        <label for="file">画　像:</label>
                        <input type="file" name="file" id="file" v-on:change="confirmImage">
                    </li>
                    <li v-show="confirmedImage">
                        <img class="img" v-bind:src="confirmedImage" alt="sweet_image" height="50px" width="50px">
                    </li>
                    <li v-show="img_message">
                        {{ $data.img_message }}
                    </li>
                    <li align="right">
                        <button class="btn btn-outline-dark" v-on:click="postSweet">登録</button>
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
                                商品名
                            </th>
                            <th>
                                単　価
                            </th>
                            <th>
                                画　像
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="sweet in sweets" v-bind:key="sweet.id">
                            <td>
                                {{ sweet.sweet_id }}
                            </td>
                            <td>
                                {{ sweet.sweet_name }}
                            </td>
                            <td>
                                {{ sweet.unit_price }}
                            </td>
                            <td>
                                <img class="img" v-bind:src="`${sweet.image_path}`" alt="sweet_image" height="50px" width="50px">
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
                    <li>
                        エラーメッセージ:
                    </li>
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
        name: 'Sweet',
        components: {},
        props: {},
        data: function () {
            return {
                showError: false,
                showContent: false,
                message: "",
                img_message: "",
                sweet_id: "",
                sweet_name: "",
                unit_price: "",
                sweets: [],
                sweetUpdate: "",
                sweet: "",
                file: "",
                confirmedImage: "",
            };
        },
        created: function() {
            this.getSweets();
        },
        mounted: function() {},
        methods: {
            getSweets() {
                axios
                    .get('/api/sweets')
                    .then(response => {
                        this.sweets = response.data;
                        console.log(response.data);
                    })
                    .catch(error => {
                        this.message = response.error.data;
                        this.showError = true;
                        // console.log(response.error.data);
                    });
            },
            confirmImage(event) {
                this.img_message = "",
                this.file = event.target.files[0];
                if(!this.file.type.match('image.*')) {
                    this.img_message = "画像ファイルを選択してください";
                    this.confirmedImage = "";
                    return;
                };
                this.createImage(this.file);
            },
            createImage(file) {
                let reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = event => {
                    this.confirmedImage = event.target.result;
                };
            },
            postSweet() {
                let new_id = this.sweets.length + 1;
                // let id_max = this.sweets[this.sweets.length - 1].id;
                // let new_id = id_max + 1;
                let formData = new FormData();
                    formData.append('sweet_id', new_id);
                    formData.append('sweet_name', this.sweet_name,);
                    formData.append('unit_price', this.unit_price);
                    formData.append('file', this.file);

                axios
                    .post('/api/sweets', formData, {
                        headers: {
                            'content-type': 'multipart/form-data'
                            }
                    })
                    .then(response => {
                        this.getSweets();
                        this.sweet_name = "";
                        this.unit_price = "";
                        this.file = "",
                        this.confirmedImage = "",
                        this.sweet = response.data;
                        // console.log(response.data);
                    })
                    .catch(error => {
                        this.message = error.response.data;
                        this.showError = true;
                        // console.log(error.response.data);
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
