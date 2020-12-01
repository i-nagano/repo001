<template>
    <div>
        <main>
            <example-component></example-component>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
    import ExampleComponent from './components/routerviews/ExampleComponent.vue';
    export default {
        name: 'MainVue',
        components: {
            ExampleComponent,
        },
    };
</script>

<style scoped>

</style>
