<template>
    <div>
        <header>
            <navbar></navbar>
        </header>
        <main>
            <!-- <example-component></example-component> -->
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
    import Navbar from './components/Navbar.vue';
    // import ExampleComponent from './components/routerviews/ExampleComponent.vue';
    export default {
        name: 'MainVue',
        components: {
            Navbar,
            // ExampleComponent,
        },
    };
</script>

<style scoped>

</style>
