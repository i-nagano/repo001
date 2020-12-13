<template>
    <div>
        <v-container>
            <v-row class="mt-2" justify="start">
                <router-link to="/home/sweet">
                    <span>Sweets</span>|
                </router-link>
                <router-link to="/home/customer">
                    <span>Customers</span>|
                </router-link>
                <router-link to="/home/register">
                    <span>Register</span>|
                </router-link>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {
    name: 'Nabvar',    
};
</script>

<style scoped>
    
</style>
