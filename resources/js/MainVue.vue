<template>
    <v-app>
        <header>
            <navbar></navbar>
        </header>
        <main>
            <router-view></router-view>
        </main>
    </v-app>
</template>

<script>
    import Navbar from './components/Navbar.vue';
    export default {
        name: 'MainVue',
        components: {
            Navbar,
        },
    };
</script>

<style scoped>

</style>
