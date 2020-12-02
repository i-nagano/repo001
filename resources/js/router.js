import Vue from 'vue';
import Router from 'vue-router';
import Sweet from './components/routerviews/Sweet.vue';

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            name: 'Sweet',
            path: '/',
            component: Sweet,
        },
        {},
    ],
});
