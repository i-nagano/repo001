import Vue from 'vue';
import Router from 'vue-router';
import Sweet from './components/routerviews/Sweet.vue';
import Customer from './components/routerviews/Customer.vue';
import Register from './components/routerviews/Register.vue';

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            name: 'Sweet',
            path: '/home/sweet',
            component: Sweet,
        },
        {
            name: 'Customer',
            path: '/home/customer',
            component: Customer,
        },
        {
            name: 'Register',
            path: '/home/register',
            component: Register,
        },
    ],
});
