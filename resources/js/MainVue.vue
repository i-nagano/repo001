<template>
    <div>
        <main>
            <example-component></example-component>
        </main>
    </div>
</template>

<script>
    import ExampleComponent from './components/ExampleComponent.vue';
    export default {
        name: 'MainVue',
        components: {
            ExampleComponent,
        },
    };
</script>

<style scoped>

</style>
