import { createRouter, createWebHistory } from 'vue-router';

import MainPage from '../components/LandingPage'
import CustomersDetailsComponent from '../components/CustomersDetailsComponent'
import RegisterCustomerComponent from '../components/RegisterCustomerComponent'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', redirect: '/customers', props: true },
        { path: '/customers', name: 'customers', component: MainPage, props: true },
        { path: '/customers/details/:customerId', name: 'details', component: CustomersDetailsComponent, props: true },
        { path: '/customers/new', name: 'register', component: RegisterCustomerComponent, props: true}
    ]
});

export default router;